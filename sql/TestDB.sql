show tables;
SELECT DISTINCT province
FROM city_list ORDER BY province;
set sql_safe_updates = 0;
delete FROM positions where positions = 'Admin';
insert into positions values('Admin');
delete from phpapplicants where applicantID =4;
select * FROM phpapplicants where positions = "Admin";
select * FROM phpapplicants;
select * FROM city_list;
select * FROM positions;
ALTER TABLE games
ADD COLUMN cover_image VARCHAR(255);