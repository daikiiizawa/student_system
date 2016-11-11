CREATE DATABASE `student_sys`;
use student_sys

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
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
  `region_code` tinyint(2),
  `address` varchar(255),
  `occupation` varchar(255),
  `large_purpose_code` tinyint(2),
  `detail_purpose` text,
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


-- 初期サンプルデータ
INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_code`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`)
                VALUES ("山田", "大輔", "ヤマダ", "ダイスケ",
                        "08000001111", "daisuke@mail.jp", "0", "1990-01-01", "1110000",  "14", "横浜市1-2-3",
                        "インフラエンジニア", "0", "Web系のスキルを身につけたい", "平日：18:00~23:00 休日：13:00~17:00", "毎日18時以降",
                        "毎週金曜20時", "毎週日曜14時", "毎週木曜20時", "0",
                        "2016-07-29 19:00:00", "2016-08-02 19:00:00", "2016-08-03 19:00:00",
                        "10月", "2016-07-27 19:00:00", "0", "0", "ABC-0003", "2016-07-21 19:00:00");

INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_code`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`)
                VALUES ("山田", "太郎", "ヤマダ", "タロウ",
                        "08000000000", "hoge@mail.jp", "0", "1990-06-06", "0000000",  "13", "千代田区0-1-2",
                        "営業", "1", "異業種のキャリアを積みたい", "平日：19:00~23:00 休日：10:00~15:00", "平日夜",
                        "毎週木曜20時", "毎週月曜21時", "毎週木曜17時", "1",
                        "2016-07-30 20:00:00", "2016-08-04 20:00:00", "2016-08-09 19:00:00",
                        "09月", "2016-07-25 19:00:00", "0", "0", "ABC-0001", "2016-07-25 19:00:00");

INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_code`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`)
                VALUES ("石田", "翔太", "イシダ", "ショウタ",
                        "08000002222", "ishida@mail.jp", "0", "1990-02-02", "2220000",  "1", "札幌市1-2-3",
                        "事務職", "2", "プログラミング経験はあるので、スキルを固めたい", "平日：19:30~21:00 休日：17:00~20:00", "毎日20時以降",
                        "毎週水曜18時", "毎週火曜20時", "毎週木曜18時", "0",
                        "2016-07-22 19:00:00", "2016-07-24 19:00:00", "2016-07-26 19:00:00",
                        "08月", "2016-07-27 19:00:00", "0", "1", "ABC-0002", "2016-07-20 19:00:00");


INSERT INTO `students` (`family_name`, `given_name`, `family_name_kana`, `given_name_kana`,
                        `phone_number`, `email`, `sex_code`, `birthdate`, `postalcode`, `region_code`, `address`,
                        `occupation`, `large_purpose_code`, `detail_purpose`, `studying_time`, `come_to_office_time`,
                        `first_preffered_date`, `second_preffered_date`, `third_preffered_date`, `using_pc_code`,
                        `first_meet_datetime`, `second_meet_datetime`, `third_meet_datetime`,
                        `admission_month`, `last_contact_datetime`, `students_status_code`, `yomi_code`, `affiliate_id`, `created`)
                VALUES ("井上", "香織", "イノウエ", "カオリ",
                        "08000003333", "inoue@mail.jp", "1", "1991-03-03", "3330000",  "10", "船橋市1-2-3",
                        "営業", "1", "新しい挑戦をしたい", "平日：19:30~21:00 休日：17:00~20:00", "毎日20時以降",
                        "毎週水曜18時", "毎週火曜20時", "毎週木曜18時", "0",
                        "2016-07-20 19:00:00", "2016-07-24 19:00:00", "2016-07-26 19:00:00",
                        "08月", "2016-07-27 19:00:00", "0", "0", "ABC-0004", "2016-07-16 19:00:00");

INSERT INTO `students` (`family_name`, `given_name`,
                        `phone_number`, `email`, `sex_code`,
                        `students_status_code`, `affiliate_id`, `created`)
                VALUES ("削除", "不明",
                        "08000003333", "sample@mail.jp", "2",
                        "3", "ABC-1111", "2016-07-10 19:00:00");
