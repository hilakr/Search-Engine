-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 10:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `search_engine`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(35) NOT NULL,
  `removed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `file_name`, `removed`) VALUES
(7, 'Let Her Go.txt', 0),
(8, 'She Will Be Loved.txt', 0),
(9, 'Waiting For Superman.txt', 0),
(10, 'coldPlayYellow.txt', 0),
(11, 'Halo.txt', 0),
(12, 'When Im Alone.txt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doc_words`
--

CREATE TABLE IF NOT EXISTS `doc_words` (
  `word_id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL,
  `offset` text NOT NULL,
  `totaldocs` int(11) NOT NULL,
  PRIMARY KEY (`word_id`,`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=759 ;

--
-- Dumping data for table `doc_words`
--

INSERT INTO `doc_words` (`word_id`, `word`, `offset`, `totaldocs`) VALUES
(380, 'let', '7:16,11:1', 2),
(381, 'her', '7:29,8:5,9:13', 3),
(382, 'go', '7:17,12:2', 2),
(383, 'well', '7:4,11:1', 2),
(384, 'you', '7:37,8:8,10:21,11:12,12:38', 4),
(385, 'only', '7:30,8:1,11:1,12:1', 3),
(386, 'need', '7:5,11:2', 2),
(387, 'the', '7:18,8:10,9:15,10:4,11:5,12:11', 5),
(388, 'light', '7:5,9:1,11:2', 3),
(389, 'when', '7:32,12:15', 2),
(390, 'burning', '7:5,11:1', 2),
(391, 'low', '7:10', 1),
(392, 'miss', '7:5', 1),
(393, 'sun', '7:5,11:1', 2),
(394, 'it', '7:6,8:1,9:3,10:3,11:9,12:2', 5),
(395, 'starts', '7:5', 1),
(396, 'to', '7:7,8:9,9:9,10:3,11:4,12:1', 5),
(397, 'snow', '7:5', 1),
(398, 'know', '7:15,8:4,10:4,11:2', 4),
(399, 'love', '7:11,9:2,10:2', 3),
(400, 'been', '7:5,9:2,11:2', 3),
(401, 'high', '7:5', 1),
(402, 'feeling', '7:6', 1),
(403, 'hate', '7:5', 1),
(404, 'road', '7:5', 1),
(405, 'missing', '7:5', 1),
(406, 'home', '7:5,12:1', 2),
(407, 'and', '7:8,8:15,9:8,10:9,11:3,12:7', 5),
(408, 'staring', '7:2', 1),
(409, 'at', '7:2,8:2,9:3,10:2', 4),
(410, 'bottom', '7:1', 1),
(411, 'of', '7:1,8:2,9:1,11:2,12:2', 4),
(412, 'your', '7:3,8:5,10:4,11:32', 4),
(413, 'glass', '7:1', 1),
(414, 'hoping', '7:1', 1),
(415, 'one', '7:2,11:1,12:10', 2),
(416, 'day', '7:2,8:3,9:1', 3),
(417, 'make', '7:1,8:3,11:1,12:10', 3),
(418, 'a', '7:1,9:13,10:6,11:5,12:5', 4),
(419, 'dream', '7:1', 1),
(420, 'last', '7:1', 1),
(421, 'but', '7:3,8:1,11:2,12:1', 3),
(422, 'dreams', '7:1', 1),
(423, 'come', '7:1,8:1', 2),
(424, 'slow', '7:2', 1),
(425, 'they', '7:1,9:1,10:9,11:3', 4),
(426, 'so', '7:2,8:2,10:3', 3),
(427, 'fast', '7:2', 1),
(428, 'see', '7:2,11:12', 2),
(429, 'close', '7:1', 1),
(430, 'eyes', '7:1', 1),
(431, 'maybe', '7:1', 1),
(432, 'understand', '7:1', 1),
(433, 'why', '7:1,12:1', 2),
(434, 'everything', '7:1,10:1,11:2', 3),
(435, 'touch', '7:2', 1),
(436, 'surely', '7:1', 1),
(437, 'dies', '7:1', 1),
(438, 'ceiling', '7:1', 1),
(439, 'in', '7:2,8:4,9:7,11:2,12:1', 4),
(440, 'dark', '7:1', 1),
(441, 'same', '7:1', 1),
(442, 'old', '7:1', 1),
(443, 'empty', '7:1', 1),
(444, 'heart', '7:1,8:1', 2),
(445, 'cause', '7:4,10:1', 2),
(446, 'comes', '7:1,8:1', 2),
(447, 'goes', '7:1', 1),
(448, 'fall', '7:1,11:1', 2),
(449, 'asleep', '7:1', 1),
(450, 'never', '7:2,11:4,12:3', 2),
(451, 'keep', '7:1', 1),
(452, 'loved', '7:1,8:11', 2),
(453, 'too', '7:2,9:2', 2),
(454, 'much', '7:1', 1),
(455, 'dived', '7:1', 1),
(456, 'deep', '7:1', 1),
(457, '#', '7:7,8:8,9:9,10:10,11:11,12:12', 5),
(458, 'she', '8:17,9:24', 2),
(459, 'will', '8:11', 1),
(460, 'be', '8:11', 1),
(461, 'beauty', '8:1', 1),
(462, 'queen', '8:1', 1),
(463, 'eighteen', '8:1', 1),
(464, 'had', '8:2,11:3', 2),
(465, 'some', '8:1', 1),
(466, 'trouble', '8:1', 1),
(467, 'with', '8:4,9:3,12:10', 3),
(468, 'herself', '8:1', 1),
(469, 'he', '8:1,9:5', 2),
(470, 'was', '8:1,9:1,10:3,12:1', 4),
(471, 'always', '8:4,12:4', 2),
(472, 'there', '8:1', 1),
(473, 'help', '8:1', 1),
(474, 'belonged', '8:1', 1),
(475, 'someone', '8:1', 1),
(476, 'else', '8:1,12:2', 2),
(477, 'i', '8:11,10:9,11:51,12:6', 3),
(478, 'drove', '8:1', 1),
(479, 'for', '8:4,9:8,10:12', 3),
(480, 'miles', '8:2', 1),
(481, 'wound', '8:1', 1),
(482, 'up', '8:1,9:6,11:1', 3),
(483, 'door', '8:3', 1),
(484, 'many', '8:1', 1),
(485, 'times', '8:1', 1),
(486, 'somehow', '8:1', 1),
(487, 'want', '8:4,11:1', 2),
(488, 'more', '8:1,11:2,12:1', 2),
(489, 'mind', '8:3', 1),
(490, 'spending', '8:3', 1),
(491, 'every', '8:4,11:2', 2),
(492, 'out', '8:3,9:1,11:2,12:2', 3),
(493, 'on', '8:7,9:4', 2),
(494, 'corner', '8:3,9:1', 2),
(495, 'pouring', '8:3', 1),
(496, 'rain', '8:3', 1),
(497, 'look', '8:3,10:10', 2),
(498, 'girl', '8:3', 1),
(499, 'broken', '8:3', 1),
(500, 'smile', '8:3', 1),
(501, 'ask', '8:3', 1),
(502, 'if', '8:3,9:1', 2),
(503, 'wants', '8:3', 1),
(504, 'stay', '8:3', 1),
(505, 'awhile', '8:3', 1),
(506, 'tap', '8:2', 1),
(507, 'my', '8:6,10:1,11:4,12:2', 3),
(508, 'window', '8:2', 1),
(509, 'knock', '8:2', 1),
(510, 'feel', '8:2,11:14,12:10', 2),
(511, 'beautiful', '8:2,10:2', 2),
(512, 'tend', '8:1', 1),
(513, 'get', '8:1', 1),
(514, 'insecure', '8:1', 1),
(515, 'matter', '8:1', 1),
(516, 'anymore', '8:1', 1),
(517, 'not', '8:1', 1),
(518, 'rainbows', '8:1', 1),
(519, 'butterflies', '8:1', 1),
(520, 'compromise', '8:1', 1),
(521, 'that', '8:3,10:1,11:3,12:1', 3),
(522, 'moves', '8:1', 1),
(523, 'us', '8:1', 1),
(524, 'along', '8:1,10:1', 2),
(525, 'yeah', '8:3,9:9,10:3,12:2', 4),
(526, 'is', '8:1', 1),
(527, 'full', '8:1', 1),
(528, 'open', '8:1', 1),
(529, 'anytime', '8:1', 1),
(530, 'where', '8:1', 1),
(531, 'hide', '8:1', 1),
(532, 'alone', '8:1,12:12', 2),
(533, 'car', '8:1,9:3', 2),
(534, 'all', '8:2,10:6,11:2', 3),
(535, 'things', '8:1,10:2', 2),
(536, 'who', '8:1,12:1', 2),
(537, 'are', '8:1,11:1,12:11', 2),
(538, 'goodbye', '8:1', 1),
(539, 'means', '8:1', 1),
(540, 'nothing', '8:1,9:1', 2),
(541, 'back', '8:1,11:1,12:1', 2),
(542, 'begs', '8:1', 1),
(543, 'me', '8:1,11:2,12:14', 2),
(544, 'catch', '8:1,9:1', 2),
(545, 'time', '8:1,12:1', 2),
(546, 'falls', '8:1', 1),
(547, 'oh', '8:1,9:4,10:5', 3),
(548, 'waiting', '9:8', 1),
(549, 'superman', '9:8', 1),
(550, 's', '9:21,11:6', 2),
(551, 'watching', '9:2', 1),
(552, 'taxi', '9:1', 1),
(553, 'driver', '9:1', 1),
(554, 'pulls', '9:1', 1),
(555, 'away', '9:1,11:3', 2),
(556, 'locked', '9:1', 1),
(557, 'inside', '9:1', 1),
(558, 'apartment', '9:1', 1),
(559, 'hundred', '9:1', 1),
(560, 'days', '9:1', 1),
(561, 'says', '9:3', 1),
(562, 'still', '9:3', 1),
(563, 'coming', '9:2', 1),
(564, 'just', '9:3,12:1', 2),
(565, 'little', '9:2', 1),
(566, 'bit', '9:2', 1),
(567, 'late', '9:4', 1),
(568, 'got', '9:2,11:1,12:1', 2),
(569, 'stuck', '9:2', 1),
(570, 'laundromat', '9:1', 1),
(571, 'washing', '9:1', 1),
(572, 'his', '9:7', 1),
(573, 'cape', '9:1', 1),
(574, 'clouds', '9:1', 1),
(575, 'roll', '9:1', 1),
(576, 'by', '9:1,11:3', 2),
(577, 'spell', '9:1', 1),
(578, 'name', '9:1', 1),
(579, 'like', '9:2,11:4,12:3', 2),
(580, 'lois', '9:1', 1),
(581, 'lane', '9:1', 1),
(582, 'smiles', '9:5', 1),
(583, 'way', '9:2,11:1', 2),
(584, 'talking', '9:3', 1),
(585, 'angels', '9:3', 1),
(586, 'counting', '9:3', 1),
(587, 'stars', '9:3,10:2', 2),
(588, 'making', '9:4', 1),
(589, 'wish', '9:3', 1),
(590, 'passing', '9:3', 1),
(591, 'dancing', '9:3', 1),
(592, 'strangers', '9:3', 1),
(593, 'falling', '9:3,11:1', 2),
(594, 'apart', '9:3', 1),
(595, 'pick', '9:3', 1),
(596, 'arms', '9:6', 1),
(597, 'trying', '9:1', 1),
(598, 'glimpse', '9:1', 1),
(599, 'sense', '9:1', 1),
(600, 'chasing', '9:1', 1),
(601, 'an', '9:1', 1),
(602, 'answer', '9:1', 1),
(603, 'sign', '9:1', 1),
(604, 'lost', '9:1', 1),
(605, 'abyss', '9:1', 1),
(606, 'this', '9:2,11:1', 2),
(607, 'metropolis', '9:1', 1),
(608, 'five', '9:1', 1),
(609, 'dime', '9:1', 1),
(610, 'saving', '9:1,11:2', 2),
(611, 'life', '9:1', 1),
(612, 'movie', '9:1', 1),
(613, 'then', '9:1,10:1', 2),
(614, 'wouldn', '9:1', 1),
(615, 't', '9:1,11:5', 2),
(616, 'end', '9:1', 1),
(617, 'left', '9:1', 1),
(618, 'without', '9:1,12:1', 2),
(619, 'kiss', '9:1', 1),
(620, 'lift', '9:2', 1),
(621, 'take', '9:2', 1),
(622, 'anywhere', '9:2', 1),
(623, 'show', '9:2', 1),
(624, 'flying', '9:2', 1),
(625, 'through', '9:2,11:1', 2),
(626, 'air', '9:2,12:1', 2),
(627, 'save', '9:2', 1),
(628, 'now', '9:2,11:4', 2),
(629, 'before', '9:2', 1),
(630, 'tonight', '9:2', 1),
(631, 'speed', '9:1', 1),
(632, 'coldplay', '10:1', 1),
(633, '-', '10:1,12:1', 2),
(634, 'yellow', '10:6', 1),
(635, 'how', '10:8', 1),
(636, 'shine', '10:8', 1),
(637, 'do', '10:6,12:1', 2),
(638, 'were', '10:2,12:1', 2),
(639, 'came', '10:1', 1),
(640, 'wrote', '10:1', 1),
(641, 'song', '10:1', 1),
(642, 'called', '10:1', 1),
(643, 'took', '10:1', 1),
(644, 'turn', '10:3', 1),
(645, 'what', '10:3', 1),
(646, 'thing', '10:3', 1),
(647, 'have', '10:1', 1),
(648, 'done', '10:1', 1),
(649, 'hook', '10:2', 1),
(650, 'skin', '10:4', 1),
(651, 'bones', '10:2', 1),
(652, 'into', '10:2', 1),
(653, 'something', '10:2', 1),
(654, 'verse', '10:2', 1),
(655, 'swam', '10:1', 1),
(656, 'across', '10:2', 1),
(657, 'jumped', '10:1', 1),
(658, 'drew', '10:2', 1),
(659, 'line', '10:2', 1),
(660, 'bleed', '10:2', 1),
(661, 'myself', '10:2', 1),
(662, 'dry', '10:2', 1),
(663, 'true', '10:1', 1),
(664, 'outro', '10:1', 1),
(665, 'remember', '11:1', 1),
(666, 'those', '11:1', 1),
(667, 'walls', '11:1', 1),
(668, 'built', '11:1', 1),
(669, 'baby', '11:6', 1),
(670, 'tumbling', '11:1', 1),
(671, 'down', '11:1', 1),
(672, 'didn', '11:2', 1),
(673, 'even', '11:3', 1),
(674, 'put', '11:1', 1),
(675, 'fight', '11:1', 1),
(676, 'sound', '11:1', 1),
(677, 'found', '11:1', 1),
(678, 'really', '11:1', 1),
(679, 'doubt', '11:1', 1),
(680, 'standing', '11:1', 1),
(681, 'halo', '11:33', 1),
(682, 'angel', '11:1', 1),
(683, 've', '11:2', 1),
(684, 'awakened', '11:2', 1),
(685, 'rule', '11:2', 1),
(686, 'breaking', '11:2', 1),
(687, 'risk', '11:2', 1),
(688, 'm', '11:10', 1),
(689, 'taking', '11:2', 1),
(690, 'ain', '11:1', 1),
(691, 'gonna', '11:2', 1),
(692, 'shut', '11:2', 1),
(693, 'everywhere', '11:3', 1),
(694, 'looking', '11:3', 1),
(695, 'surrounded', '11:3', 1),
(696, 'embrace', '11:3', 1),
(697, 'can', '11:26', 1),
(698, 're', '11:5', 1),
(699, 'grace', '11:2', 1),
(700, 'written', '11:2', 1),
(701, 'over', '11:2', 1),
(702, 'face', '11:2', 1),
(703, 'pray', '11:3', 1),
(704, 'fade', '11:3', 1),
(705, 'ooh', '11:12', 1),
(706, 'hit', '11:1', 1),
(707, 'ray', '11:1', 1),
(708, 'darkest', '11:1', 1),
(709, 'night', '11:1', 1),
(710, 'think', '11:1,12:1', 2),
(711, 'addicted', '11:1', 1),
(712, 'swore', '11:1', 1),
(713, 'd', '11:1', 1),
(714, 'again', '11:2', 1),
(715, 'don', '11:1', 1),
(716, 'gravity', '11:1', 1),
(717, 'forget', '11:1', 1),
(718, 'pull', '11:1', 1),
(719, 'ground', '11:1', 1),
(720, 'ooooh', '11:1', 1),
(721, 'oooh', '11:2', 1),
(722, 'turned', '12:1', 1),
(723, 'gone', '12:2', 1),
(724, 'flash', '12:1', 1),
(725, 'off', '12:2', 1),
(726, 'somewhere', '12:2', 1),
(727, 'phone', '12:1', 1),
(728, 'rang', '12:1', 1),
(729, 'thought', '12:1', 1),
(730, 'sprung', '12:1', 1),
(731, 'kid', '12:1', 1),
(732, 'school', '12:1', 1),
(733, 'almost', '12:1', 1),
(734, 'screamed', '12:1', 1),
(735, 'child', '12:1', 1),
(736, 'insides', '12:1', 1),
(737, 'went', '12:1', 1),
(738, 'wild', '12:1', 1),
(739, 'reach', '12:1', 1),
(740, 'grab', '12:1', 1),
(741, 'kills', '12:1', 1),
(742, 'did', '12:1', 1),
(743, 'care', '12:1', 1),
(744, 'hopeless', '12:1', 1),
(745, 'run', '12:1', 1),
(746, 'throwing', '12:1', 1),
(747, 'tantrum', '12:1', 1),
(748, 'such', '12:1', 1),
(749, 'phantom', '12:1', 1),
(750, 'remind', '12:1', 1),
(751, 'around', '12:1', 1),
(752, 'next', '12:1', 1),
(753, 'leave', '12:1', 1),
(754, 'no', '12:3', 1),
(755, 'read', '12:1', 1),
(756, 'lissie', '12:1', 1),
(757, 'lyrics', '12:1', 1),
(758, 'metrolyrics', '12:1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
