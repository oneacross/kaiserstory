create table politicians (
id int not null primary key,
name varchar(400),
role varchar(400),
party varchar(400)
);

CREATE table  medias (
  id int not null primary key,
  newssource varchar(400),
  newsdate date,
  content varchar(400),
  location  varchar(400),
  politicians_id int NOT NULL ,
  concept_id int not null,
  FOREIGN KEY (politicians_id) references politicians(id),
  foreign key (concept_id) references concepts
);

CREATE table concepts (
  word varchar(400));
