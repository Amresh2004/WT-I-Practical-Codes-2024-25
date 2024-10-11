CREATE TABLE event(
    E_No int primary key,
    Title varchar(50),
    Date date
);

insert into event values(1,'Birthday','09/20/2001');
insert into event values(2,'Anniversary','12/10/2021');
insert into event values(3,'Bachleor party','12/10/2022');

select * from event;


create table comm(
    C_No int primary key, 
    Name VARCHAR(50),
    Head VARCHAR(50),
    From_Time time, 
    To_Time time, 
    Status varchar(50)
);

insert into comm values(1,'silver event','nazmeen','05:06:48','10:05:45','coming soon');
insert into comm values(2,'Golden event','Asma','08:00:00','12:00:45','pending');
insert into comm values(3,'Star Glory','haryana','07:00:00','03:00:45','coming soon');

select * from comm;


create table ev_com(
    E_No int references event(E_No),
    C_No int REFERENCES comm(C_No)
);

INSERT into ev_com values(2,1);
INSERT INTO ev_com values(1,3);
INSERT INTO ev_com VALUES(3,2);

select * from ev_com;