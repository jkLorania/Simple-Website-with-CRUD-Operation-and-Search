SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `contactnum` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `user` (`userid`, `firstname`, `lastname`,`contactnum`) VALUES
(101, 'john', 'doe','09123456789'),
(102, 'jane', 'doe', '0987654321'),
(103, 'doctor', 'strange', '0912345987');

ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
