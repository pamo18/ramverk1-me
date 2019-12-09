--
-- Reset user
--

DELETE FROM `User`;

INSERT INTO `User` (`username`, `password`) VALUES
    ("doe", "doe"),
    ("admin", "admin")
;
