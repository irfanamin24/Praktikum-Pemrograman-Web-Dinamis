alter table mahasiswa add kelas varchar(1);

insert into mahasiswa values ('MHS05', 'Irfan Amin', 'L', 'SRAGEN', '2001-050-25', 'A');

update mahasiswa set kelas = 'A' where mahasiswa.nim = 'MHS01';
update mahasiswa set kelas = 'B' where mahasiswa.nim = 'MHS02';
update mahasiswa set kelas = 'D' where mahasiswa.nim = 'MHS03';
update mahasiswa set kelas = 'C' where mahasiswa.nim = 'MHS04';
