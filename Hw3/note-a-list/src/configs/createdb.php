<?php

$servername = "localhost";
$username = "root";
$password = "root";


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    CREATE DATABASE IF NOT EXISTS `notelist`;";
$conn->query($sql);

mysqli_select_db($conn, "notelist");
$sql = "

CREATE TABLE IF NOT EXISTS `lists` (
  `idlist` int(11) NOT NULL AUTO_INCREMENT,
  `listname` varchar(255) NOT NULL,
  `sublist` int(11) NOT NULL,
  PRIMARY KEY (`idlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


";
$conn->query($sql);
$sql = "
INSERT INTO `lists` (`idlist`, `listname`, `sublist`) VALUES
(1, 'test', 0),
(2, 'testr', 1),
(5, 'testgh', 0),
(6, 'kkkkk', 2);";


$conn->query($sql);

$sql = "
CREATE TABLE IF NOT EXISTS `notes` (
  `idnote` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `idlist` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;";

$conn->query($sql);

$sql = "

INSERT INTO `notes` (`idnote`, `title`, `description`, `idlist`, `created`) VALUES
(1, 'test', 'test test', 1, '2017-04-05 03:40:08'),
(3, 'testnte', 'gfd fdg dfg fdgfd', 0, '2017-04-05 04:31:48'),
(4, 'testnote2', 'dssdfds sd fsd  fdsd fsd fsdsd', 1, '2017-04-05 04:32:59'),
(5, 'sdgsgd', 'gdfg dfg fg dfg dfgdf', 2, '2017-04-05 04:48:07'),
(6, 'sdfsdfs55', 'dsfsdfsdfsd', 1, '2017-04-05 05:19:28');
";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
