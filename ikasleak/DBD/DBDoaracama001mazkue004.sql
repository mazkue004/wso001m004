create table bezeroa (KontratuKodea int, Telefonoa int);
alter table bezeroa add constraint gakoaBezeroa primary key (KontratuKodea);

create table herria (PostaKodea int, Izena varchar2(50), BiztanleKop int);
alter table herria add constraint gakoaHerria primary key (PostaKodea);

create table ekitaldia (EkitaldiKodea int, HasData date, BukData date, PostaKodea int);
alter table ekitaldia add constraint gakoEkitaldia primary key (EkitaldiKodea);
alter table ekitaldia add constraint arrotzEkitaldia foreign key (PostaKodea) references herria (PostaKodea);

create table menua (MenuKodea int, Mota varchar2(50), MenuPrezioa int, EkitaldiKodea int, KontratuKodea int);
alter table menua add constraint gakoMenua primary key (MenuKodea);
alter table menua add constraint arrotzMenua1 foreign key (EkitaldiKodea) references Ekitaldia (EkitaldiKodea);
alter table menua add constraint arrotzMenua2 foreign key (KontratuKodea) references Bezeroa (KontratuKodea);
alter table menua drop constraint arrotzMenua1;
alter table menua drop column EkitaldiKodea;
alter table menua drop constraint arrotzMenua2;
alter table menua drop column KontratuKodea;


create table animazioa (AnimazioKodea int, EkitaldiKodea int, AnimazioPrezioa int, KontratuKodea int);
alter table animazioa add constraint gakoAnimazioa primary key (AnimazioKodea, EkitaldiKodea);
alter table animazioa add constraint arrotzAnimazioa foreign key (EkitaldiKodea) references Ekitaldia (EkitaldiKodea);
alter table animazioa drop column KontratuKodea;
alter table animazioa add Iraupena int;

create table karaokea (AnimazioKodea int, EkitaldiKodea int);
alter table karaokea add constraint gakoaKaraokea primary key (AnimazioKodea, EkitaldiKodea);
alter table karaokea add constraint arrotzaKaraokea foreign key (AnimazioKodea,EkitaldiKodea) references animazioa(AnimazioKodea, EkitaldiKodea);

create table pailazoak (TaldeIzena varchar2(50), AnimazioKodea int, EkitaldiKodea int);
alter table pailazoak add constraint gakoaPailazoak primary key(AnimazioKodea,EkitaldiKodea);
alter table pailazoak add constraint arrotzaPailazoak foreign key(AnimazioKodea,EkitaldiKodea) references animazioa(AnimazioKodea,EkitaldiKodea);

create table dj (IzenArtistikoa varchar2(50), AnimazioKodea int, EkitaldiKodea int);
alter table dj add constraint gakoaDj primary key(AnimazioKodea, EkitaldiKodea);
alter table dj add constraint arrotzaDj foreign key(AnimazioKodea,EkitaldiKodea) references animazioa(AnimazioKodea,EkitaldiKodea );

create table pertsona_pribatua (NAN int, Izena varchar2(50), Abizena1 varchar2(50), Abizena2 varchar2(50), KontratuKodea int);
alter table pertsona_pribatua add constraint gakoaPertsona_pribatua primary key (NAN);
alter table pertsona_pribatua add constraint arrotzaPertsona_pribatua foreign key (KontratuKodea) references bezeroa(KontratuKodea);
alter table pertsona_pribatua add constraint KodUnique unique(KontratuKodea);

create table enpresa (IFZ int, Izena varchar2(50), KontratuKodea int, Nagusia varchar2(50));
alter table enpresa add constraint gakoaEnpresa primary key (IFZ);
alter table enpresa add constraint arrotzaEnpresa foreign key (KontratuKodea) references bezeroa(KontratuKodea);
alter table enpresa add constraint KodEnprUnique unique(KontratuKodea);


create table ekitaldi_kontratu_bezero (KontratuKodea int, EkitaldiKodea int, KontratuData date);
alter table ekitaldi_kontratu_bezero add constraint gakoaEkitaldiKontrBez primary key (KontratuKodea, EkitaldiKodea);
alter table ekitaldi_kontratu_bezero add constraint arrotzaEkitaldiKontrBez foreign key (KontratuKodea)references bezeroa(KontratuKodea);
alter table ekitaldi_kontratu_bezero add constraint arrotzaEkitaldiKontrBez1 foreign key (EkitaldiKodea) references ekitaldia(EkitaldiKodea);

create table ekitaldi_menua (EkitaldiKodea int, MenuKodea int);
alter table ekitaldi_menua add constraint gakoEkiMenu primary key (EkitaldiKodea,MenuKodea);
alter table ekitaldi_menua add constraint arrotzaEkitaldi foreign key (EkitaldiKodea) references ekitaldi(EkitaldiKodea);
alter table ekitaldi_menua add constraint arrotzaMenua foreign key (MenuKodea) references menua(MenuKodea);

create table menua_bezeroa (MenuKodea int, KontratuKodea int, KontratuData date);
alter table menua_bezeroa add constraint gakoaMenuBezero primary key (MenuKodea,KontratuKodea);
alter table menua_bezeroa add constraint arrotzaMenua foreign key (MenuKodea) references menua(MenuKodea);
alter table menua_bezeroa add constraint arrotzaKontratu foreign key (KontratuKodea) references bezeroa(KontratuKodea);


create table ezaugarriak (MenuKodea int, Ezaugarria varchar2(50));
alter table ezaugarriak add constraint gakoEzaugarriak primary key (MenuKodea, Ezaugarria);
alter table ezaugarriak add constraint arrotzaEzaugarriak foreign key (MenuKodea) references Menua (MenuKodea);
alter table ezaugarriak modify ezaugarria varchar2(150);

create table abestiak (AnimazioKodea int, EkitaldiKodea int, Abestia varchar2(50));
alter table abestiak add constraint gakoAbestiak primary key (AnimazioKodea, EkitaldiKodea, Abestia);
alter table abestiak add constraint arrotzaAbestiak foreign key (AnimazioKodea, EkitaldiKodea) references Karaokea (AnimazioKodea, EkitaldiKodea);

/*Tauletan datuak sartu*/
insert into bezeroa values(1,654123789);
insert into bezeroa values(2,654789123);
insert into bezeroa values(3,639852147);
insert into bezeroa values(4,674123569);
insert into bezeroa values(5,678945213);
insert into bezeroa values(6,658974123);

insert into pertsona_pribatua values(72539211, 'Onintza', 'Aracama', 'Eceiza', 1);
insert into pertsona_pribatua values(72539212, 'Maitane', 'Azkue', 'Zaldua', 2);
insert into pertsona_pribatua values(72538456, 'Jonxa', 'Aldabaldetreku', 'Alvarez',5);

insert into enpresa values(20524286, 'Aeiou', 3, 'Menchu');
insert into enpresa values(04885786, 'Orma', 4, 'Jose Luis');
insert into enpresa values(63829592, 'Elhuyar', 6, 'Elena');

insert into herria values(20810,'Orio',5000);
insert into herria values(20215,'Zegama',1400);
insert into herria values(20003,'Donostia',186500);

insert into menua values(1,'Begetarianoa',20);
insert into menua values(2,'Haurrak',8);
insert into menua values(3,'Alergiak',18);
insert into menua values(4,'Sagardotegi',30);
insert into menua values(5,'Ezkontza',80);
insert into menua values(6,'Arrunta',23);

insert into ekitaldia values(1,TO_DATE('12-11-2015', 'DD-MM-YYYY'),TO_DATE('12-11-2015', 'DD-MM-YYYY'),20810);/*Orio*/
insert into ekitaldia values(2,TO_DATE('17-11-2015', 'DD-MM-YYYY'),TO_DATE('17-11-2015', 'DD-MM-YYYY'),20215);/*Zegama*/
insert into ekitaldia values(3,TO_DATE('26-11-2015', 'DD-MM-YYYY'),TO_DATE('27-11-2015', 'DD-MM-YYYY'),20003);/*Donostia*/
insert into ekitaldia values(4,TO_DATE('25-12-2015', 'DD-MM-YYYY'),TO_DATE('27-12-2015', 'DD-MM-YYYY'),20003);/*Donostia*/


insert into ezaugarriak values(1,'Lehenengo platera: Kalabazina');
insert into ezaugarriak values(1,'Bigarren platera: Arroz albondigak melokoi saltsan');
insert into ezaugarriak values(1,'Postrea: Azenario bizkotxoa');
insert into ezaugarriak values(2,'Lehenengo platera: Spagettiak boloñesa erara');
insert into ezaugarriak values(2,'Bigarren platera: Oilasko petxuga patatekin');
insert into ezaugarriak values(2,'Postrea: Txokolatezko tarta');
insert into ezaugarriak values(3,'Bezeroak hitz egingo du zein alergia dituen');
insert into ezaugarriak values(4,'Sagardotegiko menua');
insert into ezaugarriak values(5,'Ezkontzako menua, ezkongaiekin hitz egin eta erabakitzeko');
insert into ezaugarriak values(6,'Platerak bezeroarekin hitz egin behar dira');

insert into animazioa values(1,1,500,120);/*karaokea*/
insert into animazioa values(2,2,500,180);/*karaokea*/
insert into animazioa values(3,1,600,60);/*T,m,t*/
insert into animazioa values(3,2,750,90);/*P,P,M*/
insert into animazioa values(4,3,450,45);/*o v*/
insert into animazioa values(5,4,450,45);/*d bull*/
insert into animazioa values(6,4,550,45);/*T,m,t*/
insert into animazioa values(6,3,1000,180);/*P,p,m*/
insert into animazioa values(7,1,450,45);/*o v*/
insert into animazioa values(7,2,450,45);


insert into karaokea values(1,1);/*Karaokea orion*/
insert into karaokea values(2,2);/*Karaokea zeaman*/

insert into pailazoak values('Txirri, Mirri eta Txiribiton', 3,1);/*Pailazoak orion*/
insert into pailazoak values('Txirri, Mirri eta Txiribiton', 6,4);/*Pailazoak Donostin*/
insert into pailazoak values('Pirritx, Porrotx eta Marimotots', 3,2);/*Pailazok Zeaman*/
insert into pailazoak values('Pirritx, Porrotx eta Marimotots', 6,3);/*Pailazok donostin*/

insert into dj values('Oihan Vega', 4,3);/*Dj Donostin*/
insert into dj values('Oihan Vega', 7,1);/*DJ orion*/
insert into dj values('DJ Bull', 5,4);/*Dj donostin*/

insert into ekitaldi_kontratu_bezero values(1,1,TO_DATE('05-09-2015', 'DD-MM-YYYY'));/*Onintza karaokea orion*/
insert into ekitaldi_kontratu_bezero values(2,2,TO_DATE('02-09-2015', 'DD-MM-YYYY'));/*Maitane karaokea zeaman*/
insert into ekitaldi_kontratu_bezero values(3,1,TO_DATE('20-08-2015', 'DD-MM-YYYY'));/*aeiou pailazoak orion*/
insert into ekitaldi_kontratu_bezero values(3,4,TO_DATE('10-10-2015', 'DD-MM-YYYY'));/*aeiou pailazoak donostin2*/
insert into ekitaldi_kontratu_bezero values(4,4,TO_DATE('10-09-2015', 'DD-MM-YYYY'));/*orma oihan donostin2*/
insert into ekitaldi_kontratu_bezero values(4,1,TO_DATE('10-10-2015', 'DD-MM-YYYY'));/*orma oihan orion*/
insert into ekitaldi_kontratu_bezero values(2,4,TO_DATE('10-10-2015', 'DD-MM-YYYY'));/*Maitanek dj bull donostin2*/

insert into ekitaldi_menua values(1,2);/*umeen menua orion*/
insert into ekitaldi_menua values(1,3);/*alergi menua orion*/
insert into ekitaldi_menua values(1,6);/*arrunta menua orion*/
insert into ekitaldi_menua values(4,5);/*ezkontza menua donosti2*/
insert into ekitaldi_menua values(4,2);/*umena menua donosti2*/
insert into ekitaldi_menua values(4,3);/*alergi menua donosti2*/

insert into menua_bezeroa values(1,5,TO_DATE('12-11-2015', 'DD-MM-YYYY'));/*jonxa begetariano*/
insert into menua_bezeroa values(2,5,TO_DATE('12-11-2015', 'DD-MM-YYYY'));/*jonxa haurrak*/
insert into menua_bezeroa values(6,5,TO_DATE('12-11-2015', 'DD-MM-YYYY'));/*jonxa arrunta*/
insert into menua_bezeroa values(4,6,TO_DATE('12-09-2015', 'DD-MM-YYYY'));/*sagardotegi elhuyar*/
insert into menua_bezeroa values(3,6,TO_DATE('12-09-2015', 'DD-MM-YYYY'));/*alergiak elhuyar*/

insert into abestiak values(1,1,'Baldorba-Benito Lertxundi');
insert into abestiak values(1,1,'Txoriak txori-Mikel Laboa');
insert into abestiak values(1,1,'Izarren hautsa-Xabier Lete');
insert into abestiak values(1,1,'Martxa baten lehen notak-Mikel Laboa');
insert into abestiak values(1,1,'Badira hiru aste-Mikel Urdangarin');
insert into abestiak values(2,2,'Eskuetan-Pirritx eta Porrotx');
insert into abestiak values(2,2,'Madre tierra-Chayanne');
insert into abestiak values(2,2,'La mordidita-Ricky Martin');
insert into abestiak values(2,2,'Mundu berri baten mapa-Skakeitan');


select * from bezeroa natural join pertsona_pribatua;
KONTRATUKODEA  TELEFONOA        NAN IZENA                                              ABIZENA1                                           ABIZENA2
------------- ---------- ---------- -------------------------------------------------- -------------------------------------------------- --------------------------------------------------
            1  654123789   72539211 Onintza                                            Aracama                                            Eceiza
            2  654789123   72539212 Maitane                                            Azkue                                              Zaldua
            5  678945213   72538456 Jonxa                                              Aldabaldetreku                                     Alvarez

select * from bezeroa natural join enpresa;
KONTRATUKODEA  TELEFONOA        IFZ IZENA                                              NAGUSIA
------------- ---------- ---------- -------------------------------------------------- --------------------------------------------------
            3  639852147   20524286 Aeiou                                              Menchu
            4  674123569    4885786 Orma                                               Jose Luis
            6  658974123   63829592 Elhuyar                                            Elena

			
select * from menua;
 MENUKODEA MOTA                                               MENUPREZIOA
---------- -------------------------------------------------- -----------
         1 Begetarianoa                                                20
         2 Haurrak                                                      8
         3 Alergiak                                                    18
         4 Sagardotegi                                                 30
         5 Ezkontza                                                    80
         6 Arrunta                                                     23

select * from menua natural join ezaugarriak;
 MENUKODEA MOTA                                               MENUPREZIOA EZAUGARRIA
---------- -------------------------------------------------- ----------- ------------------------------------------------------------------------------------------------------------------------------------------------------
         1 Begetarianoa                                                20 Bigarren platera: Arroz albondigak melokoi saltsan
         1 Begetarianoa                                                20 Lehenengo platera: Kalabazina
         1 Begetarianoa                                                20 Postrea: Azenario bizkotxoa
         2 Haurrak                                                      8 Bigarren platera: Oilasko petxuga patatekin
         2 Haurrak                                                      8 Lehenengo platera: Spagettiak boloñesa erara
         2 Haurrak                                                      8 Postrea: Txokolatezko tarta
         3 Alergiak                                                    18 Bezeroak hitz egingo du zein alergia dituen
         4 Sagardotegi                                                 30 Sagardotegiko menua
         5 Ezkontza                                                    80 Ezkontzako menua, ezkongaiekin hitz egin eta erabakitzeko
         6 Arrunta                                                     23 Platerak bezeroarekin hitz egin behar dira




create view menu_arrunta (kodea,mota) as select Izena,  count(mota) from enpresa natural join menua_bezeroa natural join menua group by(izena) union select Izena, count(mota) from pertsona_pribatua natural join menua_bezeroa natural join menua group by(izena);  

insert into menu_arrunta values ('Maitane', 4)
            *
ERROR en línea 1:
ORA-01732: operación de manipulación de datos no válida en esta vista

select distinct izena, telefonoa, kontratuData  from  pertsona_pribatua natural join bezeroa natural join menua_bezeroa inner join menu_arrunta on menu_arrunta.kodea=pertsona_pribatua.izena
union select distinct izena, telefonoa, kontratuData  from  enpresa natural join bezeroa natural join menua_bezeroa inner join menu_arrunta on menu_arrunta.kodea=enpresa.izena ;

IZENA                                               TELEFONOA KONTRATU
-------------------------------------------------- ---------- --------
Elhuyar                                             658974123 12/09/15
Jonxa                                               678945213 12/11/15


alter table bezeroa add constraint telef check(telefonoa >599999999 and telefonoa<700000000 or telefonoa>899999999 and telefonoa<1000000000) enable novalidate;

insert into bezeroa values (7, 800000000)
*
ERROR en línea 1:
ORA-02290: restricción de control (DBDE07.TELEF) violada

alter table pailazoak add constraint pailazoMurriz check (TaldeIzena like '% eta %')novalidate;

insert into pailazoak values('Poxpolo', 7,2)
*
ERROR en línea 1:
ORA-02290: restricción de control (DBDE07.PAILAZOMURRIZ) violada

alter table menua add constraint menuMurriz check (mota<>'Ezkontza' or menuPrezioa>50);
update menua set menuPrezioa=30 where mota='Ezkontza';
*
ERROR en línea 1:
ORA-02290: restricción de control (DBDE07.MENUMURRIZ) violada

update menua set menuPrezioa=55 where mota='Ezkontza';

insert into menua values (8,'Zeliakoa',20);

create view animazio_kop as select count(animazioKodea) as zenbatAnimazio from ekitaldia natural join animazioa;

create view eskainitako_menu_kop as select count(menuKodea) as zenbatMenu from ekitaldia natural join ekitaldi_menua natural join menua;

create view kontratatutako_bez_kop as select count(kontratuKodea) as zenbatKontratu from ekitaldia natural join ekitaldi_kontratu_bezero natural join bezeroa;


create or replace trigger t1
after insert on animazioa
for each row
when (new.iraupena>180)
begin
insert into animazioa values(:new.AnimazioKodea, :new.EkitaldiKodea, :new.AnimazioPrezioa+(:new.Iraupena-180),180);
end;

insert into animazioa values (10,1,50,190)
            *
ERROR en línea 1:
ORA-04091: la tabla DBDE07.ANIMAZIOA está mutando, puede que el disparador/la función no puedan verla
ORA-06512: en "DBDE07.T1", línea 2
ORA-04088: error durante la ejecución del disparador 'DBDE07.T1'


CREATE OR REPLACE TRIGGER t2
BEFORE INSERT OR UPDATE ON Herria
FOR EACH ROW
begin
  if(:new.biztanlekop<500)
  then
    raise_application_error(-20001, 'herri txikiegia da ekitaldi bat egiteko');
  end if;
end;

insert into herria values(20100, 'izena', 100)
            *
ERROR en línea 1:
ORA-20001: herri txikiegia da ekitaldi bat egiteko
ORA-06512: en "DBDE07.T2", línea 4
ORA-04088: error durante la ejecución del disparador 'DBDE07.T2'


create or replace trigger t3
after update on menua
for each row
begin
if (:old.MenuPrezioa > :new.menuPrezioa)
then
raise_application_error(-20001,'Menu prezioa ezin da txikitu');
end if;
end;

update menua
       *
ERROR en línea 1:
ORA-20001: Menu prezioa ezin da txikitu
ORA-06512: en "DBDE07.T3", línea 4
ORA-04088: error durante la ejecución del disparador 'DBDE07.T3'
