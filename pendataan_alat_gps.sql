PGDMP     ;                     w            pendataan_alat_gps    12.1    12.1                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    24576    pendataan_alat_gps    DATABASE     �   CREATE DATABASE pendataan_alat_gps WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Indonesian_Indonesia.1252' LC_CTYPE = 'Indonesian_Indonesia.1252';
 "   DROP DATABASE pendataan_alat_gps;
                postgres    false            �            1259    24638    gps    TABLE     E  CREATE TABLE public.gps (
    "Id_GPS" integer NOT NULL,
    "Brand_GPS" character varying(50),
    "Model_GPS" character varying(50),
    "GPS_Name" character varying(50),
    "Waranty_Month" bigint,
    "Buy_Date" date,
    "Sold_Date" date,
    "Sold_To" character varying(50),
    "Photo" text,
    "Description" text
);
    DROP TABLE public.gps;
       public         heap    postgres    false            �            1259    24636    gps_Id_GPS_seq    SEQUENCE     �   CREATE SEQUENCE public."gps_Id_GPS_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public."gps_Id_GPS_seq";
       public          postgres    false    203                       0    0    gps_Id_GPS_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public."gps_Id_GPS_seq" OWNED BY public.gps."Id_GPS";
          public          postgres    false    202            �            1259    24649    users    TABLE     N  CREATE TABLE public.users (
    "User_Id" integer NOT NULL,
    "User_Name" character varying(50),
    "User_Email" character varying(50),
    "User_Address" text,
    "User_Sex" character varying(10),
    "User_Birthday" date,
    "User_Password" character varying(50),
    "User_Role" character varying(5),
    "User_Photo" text
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    24647    users_User_Id_seq    SEQUENCE     �   CREATE SEQUENCE public."users_User_Id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public."users_User_Id_seq";
       public          postgres    false    205                       0    0    users_User_Id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public."users_User_Id_seq" OWNED BY public.users."User_Id";
          public          postgres    false    204            �
           2604    24641 
   gps Id_GPS    DEFAULT     l   ALTER TABLE ONLY public.gps ALTER COLUMN "Id_GPS" SET DEFAULT nextval('public."gps_Id_GPS_seq"'::regclass);
 ;   ALTER TABLE public.gps ALTER COLUMN "Id_GPS" DROP DEFAULT;
       public          postgres    false    202    203    203            �
           2604    24652    users User_Id    DEFAULT     r   ALTER TABLE ONLY public.users ALTER COLUMN "User_Id" SET DEFAULT nextval('public."users_User_Id_seq"'::regclass);
 >   ALTER TABLE public.users ALTER COLUMN "User_Id" DROP DEFAULT;
       public          postgres    false    204    205    205                      0    24638    gps 
   TABLE DATA           �   COPY public.gps ("Id_GPS", "Brand_GPS", "Model_GPS", "GPS_Name", "Waranty_Month", "Buy_Date", "Sold_Date", "Sold_To", "Photo", "Description") FROM stdin;
    public          postgres    false    203   S                 0    24649    users 
   TABLE DATA           �   COPY public.users ("User_Id", "User_Name", "User_Email", "User_Address", "User_Sex", "User_Birthday", "User_Password", "User_Role", "User_Photo") FROM stdin;
    public          postgres    false    205   v                  0    0    gps_Id_GPS_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public."gps_Id_GPS_seq"', 19, true);
          public          postgres    false    202                       0    0    users_User_Id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public."users_User_Id_seq"', 8, true);
          public          postgres    false    204            �
           2606    24646    gps gps_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.gps
    ADD CONSTRAINT gps_pkey PRIMARY KEY ("Id_GPS");
 6   ALTER TABLE ONLY public.gps DROP CONSTRAINT gps_pkey;
       public            postgres    false    203            �
           2606    24657    users users_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY ("User_Id");
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    205                 x�EO�n�0����8��6A3v�Х@;v9[���b=���K�-�Hđ��/��[��g���K}W=UǮ������s���ꤦ�ԽL�g�}{[ͯ���k��0����&Z�	�;���6�tDjhF0���M@�ܐ�G�p�4@��/��F��oP�x��⺱]�?��X�RXP���mKo�V��E�!is`p�.ى�fc2c��~�\NV� a���2[�b�}�8�^!��|��줾�Svu�+2�۶Q���|4H&�0m���u�<王         �   x����N�0�g�)��|�8�7�@�Y��Ҵ�	m,���l,�t�p��1���0e���d�R�3~Wr���-��@���
.$j炖Bqc�	�S������2QC��3c�{n[�,��'>a����o�^�x<�n�}�ٰ��z	X����X�?�Z���7:5g/����k��H�-^�
�N$�`e^'��SJ ��W�     