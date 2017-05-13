create table conta_bancaria (
id int not null auto_increment primary key,
tipo_conta int (2) not null,
banco int (2) not null,
agencia varchar (50) not null,
conta varchar (50) not null,
titular varchar (50) not null,
status varchar (50) not null);
