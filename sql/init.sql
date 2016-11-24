CREATE DATABASE `student_sys`;
use student_sys

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `try_login` int(11) default 0,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;
ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `given_name` varchar(50) NOT NULL,
  `family_name_kana` varchar(50),
  `given_name_kana` varchar(50),
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex_code` tinyint(2),
  `birthdate` date,
  `postalcode` int(7),
  `region_id` int(11) NOT NULL,
  `address` varchar(255),
  `occupation` varchar(255),
  `large_purpose_code` tinyint(2),
  `detail_purpose` text,
  `programming_lv_code` tinyint(2),
  `studying_time` varchar(255),
  `come_to_office_time` varchar(255),
  `first_preffered_date` varchar(255),
  `second_preffered_date` varchar(255),
  `third_preffered_date` varchar(255),
  `using_pc_code` tinyint(2),
  `first_meet_datetime` datetime,
  `second_meet_datetime` datetime,
  `third_meet_datetime` datetime,
  `admission_month` varchar(6),
  `last_contact_datetime` datetime,
  `students_status_code` tinyint(2),
  `yomi_code` tinyint(2),
  `affiliate_id` varchar(255),
  `comment` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;
ALTER TABLE `students` ADD PRIMARY KEY (`id`);
ALTER TABLE `students` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_code` char(2) NOT NULL,
  `region_name` varchar(8) NOT NULL,
  `block_name` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `region_code` (`region_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- 都道府県初期データ投入
INSERT INTO `regions` (`id`, `region_code`, `region_name`, `block_name`) VALUES
(1, '13', '東京都', '関東'),
(2, '12', '千葉県', '関東'),
(3, '14', '神奈川県', '関東'),
(4, '11', '埼玉県', '関東'),
(5, '08', '茨城県', '関東'),
(6, '09', '栃木県', '関東'),
(7, '10', '群馬県', '関東'),
(8, '01', '北海道', '北海道・東北'),
(9, '02', '青森県', '北海道・東北'),
(10, '03', '岩手県', '北海道・東北'),
(11, '04', '宮城県', '北海道・東北'),
(12, '05', '秋田県', '北海道・東北'),
(13, '06', '山形県', '北海道・東北'),
(14, '07', '福島県', '北海道・東北'),
(15, '15', '新潟県', '中部'),
(16, '16', '富山県', '中部'),
(17, '17', '石川県', '中部'),
(18, '18', '福井県', '中部'),
(19, '19', '山梨県', '中部'),
(20, '20', '長野県', '中部'),
(21, '21', '岐阜県', '中部'),
(22, '22', '静岡県', '中部'),
(23, '23', '愛知県', '中部'),
(24, '24', '三重県', '近畿'),
(25, '25', '滋賀県', '近畿'),
(26, '26', '京都府', '近畿'),
(27, '27', '大阪府', '近畿'),
(28, '28', '兵庫県', '近畿'),
(29, '29', '奈良県', '近畿'),
(30, '30', '和歌山県', '近畿'),
(31, '31', '鳥取県', '中国'),
(32, '32', '島根県', '中国'),
(33, '33', '岡山県', '中国'),
(34, '34', '広島県', '中国'),
(35, '35', '山口県', '中国'),
(36, '36', '徳島県', '四国'),
(37, '37', '香川県', '四国'),
(38, '38', '愛媛県', '四国'),
(39, '39', '高知県', '四国'),
(40, '40', '福岡県', '九州・沖縄'),
(41, '41', '佐賀県', '九州・沖縄'),
(42, '42', '長崎県', '九州・沖縄'),
(43, '43', '熊本県', '九州・沖縄'),
(44, '44', '大分県', '九州・沖縄'),
(45, '45', '宮崎県', '九州・沖縄'),
(46, '46', '鹿児島県', '九州・沖縄'),
(47, '47', '沖縄県', '九州・沖縄');

-- 外部キー設定
ALTER TABLE `students` ADD KEY `region_id` (`region_id`);
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

-- 初期サンプルデータ
INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_id`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `programming_lv_code`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`, `updated`)
                VALUES ("山田", "大輔", "ヤマダ", "ダイスケ",
                        "08000001111", "daisuke@mail.jp", "0", "1990-01-01", "1110000",  "14", "横浜市1-2-3",
                        "インフラエンジニア", "0", "Web系のスキルを身につけたい", "1", "平日：18:00~23:00 休日：13:00~17:00", "毎日18時以降",
                        "毎週金曜20時", "毎週日曜14時", "毎週木曜20時", "0",
                        "2016-07-29 19:00:00", "2016-08-02 19:00:00", "2016-08-03 19:00:00",
                        "10月", "2016-07-27 19:00:00", "0", "0", "ABC-0003", "2016-07-21 19:00:00", "2016-07-25 19:00:00");

INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_id`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `programming_lv_code`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`, `updated`)
                VALUES ("山田", "太郎", "ヤマダ", "タロウ",
                        "08000000000", "hoge@mail.jp", "0", "1990-06-06", "2220000",  "13", "千代田区0-1-2",
                        "営業", "1", "異業種のキャリアを積みたい", "1", "平日：19:00~23:00 休日：10:00~15:00", "平日夜",
                        "毎週木曜20時", "毎週月曜21時", "毎週木曜17時", "1",
                        "2016-07-30 20:00:00", "2016-08-04 20:00:00", "2016-08-09 19:00:00",
                        "09月", "2016-07-25 19:00:00", "0", "0", "ABC-0001", "2016-07-25 19:00:00", "2016-07-25 19:00:00");

INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_id`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `programming_lv_code`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`, `updated`)
                VALUES ("石田", "翔太", "イシダ", "ショウタ",
                        "08000002222", "ishida@mail.jp", "0", "1990-02-02", "3330000",  "1", "札幌市1-2-3",
                        "事務職", "2", "プログラミング経験はあるので、スキルを固めたい", "1", "平日：19:30~21:00 休日：17:00~20:00", "毎日20時以降",
                        "毎週水曜18時", "毎週火曜20時", "毎週木曜18時", "0",
                        "2016-07-22 19:00:00", "2016-07-24 19:00:00", "2016-07-26 19:00:00",
                        "08月", "2016-07-27 19:00:00", "0", "1", "ABC-0002", "2016-07-20 19:00:00", "2016-07-20 19:00:00");


INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_id`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `programming_lv_code`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`, `updated`)
                VALUES ("井上", "香織", "イノウエ", "カオリ",
                        "08000003333", "inoue@mail.jp", "1", "1991-03-03", "5550000",  "10", "船橋市1-2-3",
                        "営業", "1", "新しい挑戦をしたい", "1", "平日：19:30~21:00 休日：17:00~20:00", "毎日20時以降",
                        "毎週水曜18時", "毎週火曜20時", "毎週木曜18時", "0",
                        "2016-07-20 19:00:00", "2016-07-24 19:00:00", "2016-07-26 19:00:00",
                        "08月", "2016-07-27 19:00:00", "0", "0", "ABC-0004", "2016-07-16 19:00:00", "2016-07-16 19:00:00");

INSERT INTO `students` (`family_name`, `given_name`,
                        `phone_number`, `email`, `sex_code`, `region_id`,
                        `students_status_code`, `affiliate_id`, `created`)
                VALUES ("削除", "不明",
                        "08000003333", "sample@mail.jp", "2", "1",
                        "3", "ABC-1111", "2016-07-10 19:00:00");
