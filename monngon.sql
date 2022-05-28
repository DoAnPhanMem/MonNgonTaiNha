create database monngon;
use monngon;
-- tao bang tinh thanh
Create table TinhThanh(
	maTT int AUTO_INCREMENT primary key,
	tenTT nvarchar(100) not null
);


-- tao bang quan huyen
Create table QuanHuyen(
	maQH int AUTO_INCREMENT primary key,
	tenQH nvarchar(100) not null,
	maTT int,
	CONSTRAINT FK_maTT FOREIGN KEY(maTT) REFERENCES TinhThanh(maTT)
);


-- tao bang tinh thanh
Create table PhuongXa(
	maPX int AUTO_INCREMENT primary key,
	tenPX nvarchar(100),
	maQH int,
	CONSTRAINT FK_maQH FOREIGN KEY(maQH) REFERENCES QuanHuyen(maQH)
);
-- Tao bang Quyen
create table Quyen(
	MaQuyen int AUTO_INCREMENT primary key,
	TenQuyen nvarchar(30) not null
);


-- Tao bang Nguoi Dung-- 
create table NguoiDung(
	maND int AUTO_INCREMENT primary key,
	hoTen nvarchar(50),
	ngaySinh date,
	sdt varchar(10) unique,
	cccd char(12) unique,
	email varchar(50) unique,
	gioiTinh char(1),
	diaChi nvarchar(50),
	username varchar(30) not null,
	password varchar(30) not null,
	anhDaiDien text,
	maPX int,
	maQuyen int,
	trangThai char(1) default '1',
	check(sdt like '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
	check (email like '[a-z]%@%'),
	check(gioiTinh = '0' or gioiTinh = '1'),
	check(trangThai = '0' or trangThai = '1'),
	constraint FK_NguoiDung_PhuongXa foreign key (maPX)
		references PhuongXa(maPX),
	constraint FK_NguoiDung_Quyen foreign key (maQuyen)
		references Quyen(maQuyen)
);



-- Tao bang Chu de
Create table ChuDe
(
	MaChuDe int AUTO_INCREMENT primary key,
	TenChuDe Text not null,
	HinhAnhChuDe varchar(255)
);

-- Tao bang Bai Dang
create table BaiDang
(
	MaBaiDang int AUTO_INCREMENT primary key,
	MaND int,
    foreign key(MaND) references NguoiDung(MaND),
	TieuDe text not null,
	MoTa text not null,
	KhauPhan int not null,
	TrangThai nvarchar(50) 
		check (TrangThai in ('Đã Duyệt','Chưa Duyệt')),
	DoKho int 
		check (DoKho in(1,2,3,4,5)),
	GhiChu text null,
	LuotXem int null,
	NgayCapNhat datetime not null
);


-- Tao bang Chi tiet chu de
Create table ChiTietChuDe
(
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
		on delete
			cascade
		on update
			cascade,
	MaChuDe int ,
    foreign key(MaChuDe) references ChuDe(MaChuDe)
		on delete
			cascade
		on update
			cascade,
	Primary key(MaBaiDang, MaChuDe)
);
-- Tao bang Yeu thich	
Create table YeuThich
(
	MaND int,
    foreign key(MaND) references NguoiDung(MaND)
		on delete
			cascade
		on update
			cascade,
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
		on delete
			cascade
		on update
			cascade,
	Primary key(MaND, MaBaiDang)
);

-- Tao bang Hinh anh
create table HinhAnh 
(
	MaHinhAnh int AUTO_INCREMENT,
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
	on delete
			cascade
		on update
			cascade,
	primary key(MaHinhAnh, MaBaiDang),
	HinhAnh varchar(255) not null
);

-- Tao bang Video
create table Video
(
	MaViDeo int AUTO_INCREMENT,
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
	on delete
			cascade
		on update
			cascade,
	primary key(MaVideo, MaBaiDang),
	Video nvarchar(255) not null
);
-- Tao bang Nguyen Lieu
Create table NguyenLieu(
	MaNguyenLieu int AUTO_INCREMENT,
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
	on delete
			cascade
		on update
			cascade,
			primary key(MaNguyenLieu, MaBaiDang),
	TenNguyenLieu int not null,
	SoLuong int  not null , 
	DonVi int   not null 
);

-- Tao bang Buoc lam
Create table BuocLam(
	MaBuocLam  int AUTO_INCREMENT,
	NoiDung Text not null,
	ThoiGian Time not null,
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
	on delete
			cascade
		on update
			cascade,
			primary key(MaBuocLam, MaBaiDang)
);

-- Tao bang Binh Luan
Create table BinhLuan(
	MaBinhLuan  int AUTO_INCREMENT ,
	MaBaiDang int,
    foreign key(MaBaiDang) references BaiDang(MaBaiDang)
	on delete
			cascade
		on update
			cascade,
	MaND int,
    foreign key(MaND) references NguoiDung(MaND)
	on delete
			cascade
		on update
			cascade,
			primary key(MaBinhLuan, MaBaiDang ,MaND),
	Noidung text  not null
);


