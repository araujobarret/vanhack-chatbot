-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2017 às 21:54
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatrobot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ignored_words`
--

CREATE TABLE `ignored_words` (
  `id` int(11) NOT NULL,
  `word` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ignored_words`
--

INSERT INTO `ignored_words` (`id`, `word`) VALUES
(1, 'are'),
(2, 'is'),
(3, 'my'),
(4, 'i'),
(5, 'am'),
(6, 'i\'m'),
(7, 'to'),
(8, 'so'),
(9, 'or'),
(10, 'it'),
(11, 'you'),
(12, 'will'),
(13, 'do'),
(14, 'have'),
(15, 'want'),
(16, 'what\'s'),
(17, 'what'),
(18, 'there'),
(19, 'for'),
(20, 'but'),
(21, 'a'),
(22, 'in'),
(23, 'on'),
(24, 'can'),
(25, 'from'),
(26, 'if'),
(27, 'of'),
(28, '?'),
(29, '.'),
(30, '...'),
(31, ','),
(32, '('),
(33, ')'),
(34, '/'),
(35, 'proceed'),
(36, 'pc'),
(37, 'takes'),
(38, 'capable'),
(39, 'the'),
(40, 'with'),
(41, 'ms'),
(42, 'others'),
(43, 'and'),
(44, 'just'),
(45, 'going'),
(46, 'around'),
(47, 'circles'),
(48, 'between'),
(49, 'keep'),
(50, 'bought'),
(51, 'new'),
(52, 'weeks'),
(53, 'now'),
(54, 'sell'),
(55, 'it\'s'),
(56, 'says'),
(57, 'need'),
(58, 'take'),
(59, 'does'),
(60, 'has'),
(61, 'no'),
(62, 'yet'),
(63, 'disc/usb'),
(64, 'error');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions_answers`
--

CREATE TABLE `questions_answers` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questions_answers`
--

INSERT INTO `questions_answers` (`id`, `question`, `answer`) VALUES
(1, 'Where is my product key?', 'Once order is verified for your security, email will be dispatched containing your download link and license key.'),
(2, 'My product key is not working, how to proceed?', 'You may report this issue to our technical support team via chat,call or email so that we can address the concern right away.'),
(3, 'I have purchased Office for Mac but I have a Windows PC, how to proceed?', 'While we make every attempt to ensure you are satisfied with your purchase, please be aware that once we issue you a Microsoft Product Key via email or electronically, the sale is considered final once you have received it we cannot accept refund requests. We cannot issue refunds once product keys have been distributed. Should you have any issues with the key, we bear the full responsibility of replacing it, i.e. any issue with the installation etc.\r\n\r\nAs the buyer, it is your responsibility to know your system and compatibility requirements of the product before making a purchase. If you have any questions or concerns prior to making your purchase, please take advantage of our Live Chat or talk it through with our Customer Care team if you are unsure of your purchase.'),
(4, 'How long it takes to receive my product?', 'it will only take 10-15 minutes for you to receive the email that has all the information for you to download and install the Software that you\'ve purchased. The download time depends on your internet connection.'),
(5, 'Will I receive CD/DVD of my purchase?', 'How long the licences you sell last?'),
(6, 'What if I want to reinstall my software?', 'You may transfer the software to another computer that belongs to you, but not more than one time every 90 days (except due to hardware failure, in which case you may transfer sooner). If you transfer the software to another computer, that other computer becomes the \"licensed computer.\" You may also transfer the software (together with the license) to a computer owned by someone else if a) you are the first licensed user of the software and b) the new user agrees to the terms of this agreement before the transfer. Any time you transfer the software to a new computer, you must remove the software from the prior computer and you may not retain any copies.'),
(7, 'I\'m not capable to do the upgrade with the software I purchased from you, how can I proceed?', 'Our softwares requires clean installation for it to work. It would be best if you uninstall your old software first, restart your computer and use the download link we sent you to prevent software conflicts.'),
(8, 'How many computers can I install the software I purchased in?', 'All of our softwares are only good for 1 PC except office 365.'),
(9, 'What\'s the difference of the MS Office Student edition and the others editions?', 'The office home and student has all basic applications. There will be additional  applications as you upgrade.'),
(10, 'What is the minimum requirement for the software …?', 'It depends. Kindly check the system requirements for each softwares located under the description tab.\r\n'),
(11, 'I\'m unable to activate my product and I\'m just going around in circles?', 'Thank you for bringing this issue to our attention. Rest assured that we will be doing our best to resolve this issue for you. Please contact our support  and provide the error message that you’re getting to better address your concern.\r\n'),
(12, 'Where is my Refund?', 'Kindly allow 24-48 hours to have your refund request processed. Your refund should appear on your credit card/bank statement within the next 24-72 hours once processed.\r\n'),
(13, 'What is difference between 2010, 2013 and 2016?', 'The Interface changes more noticeably from Office 2010 to 2013 then to 2016. And the BIG change in Office 2016 is it’s integration with online and teamwork features. On upgrading to 2016 we immediately exploited Outlook’s now integrated ‘Clutter’ feature and began to make use of the integration of ‘Groups’ that was absent before.\r\n\r\nIn Office 2013 and now 2016 the availability of the ‘Recent Items’ list is a small feature that we find ourselves using all the time, particularly to attach a file to an Outlook message.'),
(14, 'Why the price so low?', 'We are a licensed re seller of Microsoft products. We are cheaper because we buy in bulk order.'),
(15, 'Is there a time limit on software installation? Can I keep it until I bought new computer weeks or months from now?', 'There is no time limit for you to install the software.'),
(16, 'Are you based in (UK)(US)(CANADA)(AUS)?', 'All supports are based in the Philippines.'),
(17, 'Promo code is not working.', 'Our Promo Codes are up to date. We would highly suggest for you to clear your browsing history or use a different browser and try again.'),
(18, 'What are your Hours?', 'Our phone support are open Mon to Fri - 8AM to 5PM. Chat and email support are available for you 24/7.\r\n'),
(19, 'Do you have paypal payment option?', 'Currently, we are unable to process payments using Paypal. We apologize the inconvenience. We assured you our support staff is having this issue rectified. All Credit Cards and Debit Cards are accepted (VISA, Master Card, AMEX).'),
(20, 'How long the licences you sell last?', 'This is a perpetual/lifetime license.'),
(21, 'I need my password reset.', 'Kindly click on forgot password to reset your password.'),
(22, 'Can I download the software from your website?', 'Yes, by logging into your account.'),
(23, 'How long does the download take?', 'The download time depends on your internet connection and the file size of your software purchased.'),
(24, 'My Office says it\'s not valid used to many times', 'If you\'re getting the error message <i>\"...the specified Product key has already been activated the Maximum number of times,\"</i> here are the recommended steps that you can take:\r\n\r\n1) Kindly open Microsoft Word/Excel, from the Activation Wizard, please select \'Activate by telephone\'.\r\n\r\n<img src=\"img/24_1.jpg\" />\r\n\r\n2) Have a screenshot or copy the Installation ID and email it to us.\r\n\r\n<img src=\"img/24_2.jpg\" />\r\n\r\n3) We will have it verified and reply to you with the Confirmation ID from Microsoft to activate your software.\r\n\r\nShould you have any questions or concern, please do not hesitate to contact us via email, chat or hotline no.\r\nVisit us at our website and find out more offers for your daily computing needs.'),
(25, 'Can I save the software to a disc/usb and transfer to a computer that has no outlook setup yet?', '<b>Yes. Kindly follow the steps below:</b>\r\n1. Download the Power ISO software using the link below:\r\n<a href=\\\"http://www.mediafire.com/download/b7ka9csvf7ik42f/PowerISO5.exe\\\">http://www.mediafire.com/download/b7ka9csvf7ik42f/PowerISO5.exe</a>\r\n\r\n2. Click on the I Agree button in the License Agreement window.\r\n\r\n<img src=\"img/25_1.jpg\" />\r\n\r\n3. Choose the location where the file will be saved. Click on the Browse button to choose where to save it. Then click on Install button.\r\n\r\n<img src=\"img/25_2.jpg\" />\r\n\r\n4. At this point, it is now installing. Once the green bar is all the way to the end, click on the Next button.\r\n\r\n<img src=\"img/25_3.jpg\" />\r\n\r\n5. Installation is now complete. Click on the Close button to exit the installation wizard.\r\n\r\n\r\n<img src=\"img/25_4.jpg\" />\r\n\r\n6. Insert the USB drive that will be used to save the file. Then open the Power ISO icon on the desktop. Then click on Tools and selectCreate a Bootable USB Drive.\r\n\r\n<img src=\"img/25_5.jpg\" />\r\n\r\n7. A pop-up window will appear, just click on OK.\r\n\r\n<img src=\"img/25_6.jpg\" />\r\n\r\n8. Click on the folder icon under Source Image File to select the location of the software that needs to be copied. Make sure that the correct Drive for your USB is selected under Destination USB Drive. Then click on the Start button.\r\n\r\n<img src=\"img/25_7.jpg\" />\r\n\r\n9. Power ISO will start copying the file to the USB. It usually takes 10-15 minutes until the process is finished. Once it is done, you can now safely remove the USB drive and close the Power ISO window and prepare to install the copied software.\r\n'),
(26, 'My Office says it\'s not valid error geographical regions ', 'Here are the recommended steps that you can take to rectify this issue.\r\n\r\n1) Kindly open Microsoft Word/Excel, from the Activation Wizard, please select \'Activate by telephone\'\r\n\r\n<img src=\"img/26_1.jpg\" />\r\n\r\n2) Have a screenshot or copy the Installation ID and email it to us.\r\n\r\n<img src=\"img/26_2.jpg\" />\r\n\r\n3) We will have it verified and reply to you with the Confirmation ID from Microsoft to activate your software.\r\n\r\nShould you have any questions or concern, please do not hesitate to contact us via email, chat or hotline no.\r\nVisit us at our website and find out more offers for your daily computing needs.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ignored_words`
--
ALTER TABLE `ignored_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_answers`
--
ALTER TABLE `questions_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ignored_words`
--
ALTER TABLE `ignored_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `questions_answers`
--
ALTER TABLE `questions_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
