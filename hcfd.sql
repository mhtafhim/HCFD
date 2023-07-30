--CREATE DATABASE hcfd_database

--use hcfd_database

INSERT INTO MEMBER (memberName,memberPhone,bloodGroup,fathersName,mothersName,permanentAddress,presentAddress,institute,class,depertment,guardianName,guardianPhone,email) VALUES ('Mahmudul Haque Tafhim','++8801741645372','A+','Nurul Haque','Asia Khatun','Tamaraddi,Hatiya','Banasree,Dhaka',
'Ahsanullah University of Science and Technology','3rd Year 1st Semester','CSE','Mansurul Haque','+8801859469336','mahmudulhoquetafhim@gmail.com');


CREATE TABLE MEMBER(
	memberID int IDENTITY(10000,1) PRIMARY KEY,
	memberName varchar(50) not null,
	memberPhone varchar(15) not null,
	bloodGroup varchar(5) not null,
	fathersName varchar(50) not null,
	mothersName varchar(50) not null,
	permanentAddress varchar(70) not null,
	presentAddress varchar(70) not null,
	institute varchar(50) null,
	class varchar(30) null,
	depertment varchar(30) null,
	guardianName varchar(50) null,
	guardianPhone varchar(20) null,
	email varchar(50) not null

);

SELECT * FROM MEMBER


INSERT INTO MEMBER VALUES ('Mahmudul Haque Tafhim','++8801741645372','A+','Nurul Haque','Asia Khatun','Tamaraddi,Hatiya','Banasree,Dhaka',
'Ahsanullah University of Science and Technology','3rd Year 1st Semester','CSE','Mansurul Haque','+8801859469336','mahmudulhoquetafhim@gmail.com');




INSERT INTO MEMBER VALUES ('Mansurul Hoque Tanvir','+8801859469336','B+','Nurul Haque','Asia Khatun','Tamaraddi,Hatiya','Banasree,Dhaka',
'Dhaka College','Masters','English Literature','Tanjimuddin','+8801789013232','mansurulhoque4@gmail.com');

delete from MEMBER where memberID = 10002


select IDENT_CURRENT('MEMBER') as 'memID'

create table COMMITTEE(
	C_memID int identity(20000,1) primary key,
	memberID int foreign key references MEMBER(memberID),
	designation varchar(50) not null,
	ranks int not null,
	session int not null,
	fromDate date  null,
	toDate date  null
)

drop table COMMITTEE



insert into COMMITTEE (memberID,designation,ranks,session,fromDate)values (10000,'President',1,2023,GETDATE());

insert into COMMITTEE (memberID,designation,ranks,session,fromDate)values (10002,'President',1,2023,GETDATE());


insert into COMMITTEE (memberID,designation,ranks,session,fromDate)values (1,'President',1,2023,CURRENT_DATE);




select * from committee join member on member.memberID = committee.memberID where SESSION = 2023