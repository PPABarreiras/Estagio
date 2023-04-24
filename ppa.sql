create schema ppa;
use ppa;

create table curso(
nome varchar(50) not null,
id_curso integer primary key auto_increment not null
);

insert into curso (nome) values ("Informatica");
insert into curso (nome) values ("Alimentos");
insert into curso (nome) values ("Edificação");

create table aluno (
matricula varchar(20) primary key not null,
nome varchar(50) not null,
turma integer not null,
email varchar(50) not null,
telefone varchar(20) not null,
orientador varchar(30) not null,
setor varchar(20) not null,
empresa varchar(30) not null,
remunerado varchar(10) not null,
id_curso integer auto_increment not null,
documento varchar (500),
foreign key (id_curso) references curso(id_curso)
);

create table alunotcc (
matriculatcc varchar(20) primary key not null,
nome varchar(50) not null,
telefone varchar(20) not null,
email varchar(50) not null,
turma integer not null,
orientador varchar(30) not null,
tema varchar(100) not null,
datainicio varchar(30) not null,
datadefesa varchar(30),
dataconclusao varchar(30),
previsaotermino varchar(30),
id_curso integer auto_increment not null,
documento varchar (500),
foreign key (id_curso) references curso(id_curso)
);

create table coordenacao(
siape varchar(20) primary key not null,
nome varchar(50) not null,
email varchar(50) not null,
senha varchar(20) not null,
id_curso integer auto_increment not null,
nivel varchar (50) not null,
foreign key (id_curso) references curso(id_curso)
);

create table notas_estagio(
matricula varchar(20) primary key not null,
nota_relatorio float not null,
nota_orientador float not null,
nota_empresa float not null,
nota_aluno float not null,
nota_final float not null,
foreign key (matricula) references aluno (matricula)
);

create table notas_tcc(
matriculatcc varchar(20) primary key not null,
avaliador1 float not null,
avaliador2 float not null,
avaliador3 float not null,
avaliador4 float,
nota_final float not null,
foreign key (matriculatcc) references alunotcc (matriculatcc)
);

create table encontros(
matricula varchar(20) primary key not null,
encontro1 date not null,
encontro2 date not null,
encontro3 date not null,
foreign key (matricula) references aluno (matricula)
);

create table encontrosTCC(
matriculatcc varchar(20) primary key not null,
encontro1 date not null,
encontro2 date not null,
encontro3 date not null,
foreign key (matriculatcc) references alunotcc (matriculatcc)
);

select * from curso;
select * from aluno;
select * from alunotcc;
select * from coordenacao;
select * from notas_estagio;
select * from notas_tcc;
select * from encontros;
select * from encontrosTCC;



