<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML>
<BODY>
<xsl:for-each select="/assessmentItems/assessmentItem">
Enuntziatua: <FONT SIZE="2" COLOR="red" FACE="Verdana">
<xsl:value-of select="itembody/p"/> <BR/>
</FONT>
Egilea: <FONT SIZE="2" COLOR="blue" FACE="Verdana">
<xsl:value-of select=""/> <BR/>
</FONT>
Prezioa: <FONT SIZE="2" COLOR="green" FACE="Verdana">
<xsl:value-of select=""/> Euro.<BR/>
</FONT>
</xsl:for-each>
</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>

