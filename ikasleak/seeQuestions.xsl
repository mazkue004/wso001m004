<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<HTML>
			<BODY>
				<TABLE border="1">
					<THEAD>
						<TR>
							<TH>Enuntziatua</TH>
							<TH>Konplexutasuna</TH>
							<TH>Gaia</TH>
						</TR>
					</THEAD>
					<xsl:for-each select="/assessmentItems/assessmentItem">
						<TR>
							<TD>
								<xsl:value-of select="itembody/p">
									<BR/>
								</TD>
								<TD>
									<xsl:value-of select="@konplexutasuna">
										<BR/>
									</TD>
									<TD>
										<xsl:value-of select="@subject">
											<BR/>
										</TD>
									</TR>
								</xsl:for-each>
							</TABLE>
						</BODY>
					</HTML>
				</xsl:template>
			</xsl:stylesheet>