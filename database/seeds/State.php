<?php

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	$array = array(array(1,'Inglés','en'),array(2,'Afar','aa'),array(3,'Abkhazian','ab'),array(4,'Afrikaans','af'),array(5,'Amharic','am'),array(6,'Árabe','ar'),array(7,'Assamese','as'),array(8,'Aymara','ay'),array(9,'Azerbaijani','az'),array(10,'Bashkir','ba'),array(11,'Bielorruso','be'),array(12,'Bulgaro','bg'),array(13,'Bihari','bh'),array(14,'Bislama','bi'),array(15,'Bengali/Bangla','bn'),array(16,'Tibetan','bo'),array(17,'Breton','br'),array(18,'Catalan','ca'),array(19,'Corsican','co'),array(20,'Czech','cs'),array(21,'Welsh','cy'),array(22,'Danés','da'),array(23,'Alemán','de'),array(24,'Bhutani','dz'),array(25,'Griego','el'),array(26,'Esperanto','eo'),array(27,'Español','es'),array(28,'Estonian','et'),array(29,'Basque','eu'),array(30,'Persian','fa'),array(31,'Finlandés','fi'),array(32,'Fiji','fj'),array(33,'Faeroese','fo'),array(34,'Francés','fr'),array(35,'Frisian','fy'),array(36,'Irlandés','ga'),array(37,'Escocés/Gaelic','gd'),array(38,'Gallego','gl'),array(39,'Guarani','gn'),array(40,'Gujarati','gu'),array(41,'Hausa','ha'),array(42,'Hindi','hi'),array(43,'Croata','hr'),array(44,'Hungaro','hu'),array(45,'Armenian','hy'),array(46,'Interlingua','ia'),array(47,'Interlingue','ie'),array(48,'Inupiak','ik'),array(49,'Indonesian','in'),array(50,'Icelandic','is'),array(51,'Italiano','it'),array(52,'Hebrew','iw'),array(53,'Japonés','ja'),array(54,'Yiddish','ji'),array(55,'Javanese','jw'),array(56,'Georgian','ka'),array(57,'Kazakh','kk'),array(58,'Greenlandic','kl'),array(59,'Cambodian','km'),array(60,'Kannada','kn'),array(61,'Coreano','ko'),array(62,'Kashmiri','ks'),array(63,'Kurdo','ku'),array(64,'Kirghiz','ky'),array(65,'Latin','la'),array(66,'Lingala','ln'),array(67,'Laothian','lo'),array(68,'Lituano','lt'),array(69,'Latvian/Lettish','lv'),array(70,'Malagasy','mg'),array(71,'Maori','mi'),array(72,'Macedonian','mk'),array(73,'Malayalam','ml'),array(74,'Mongolian','mn'),array(75,'Moldavo','mo'),array(76,'Marathi','mr'),array(77,'Malay','ms'),array(78,'Maltese','mt'),array(79,'Burmese','my'),array(80,'Nauru','na'),array(81,'Nepali','ne'),array(82,'Holandés','nl'),array(83,'Noruego','no'),array(84,'Occitan','oc'),array(85,'(Afan)/Oromoor/Oriya','om'),array(86,'Punjabi','pa'),array(87,'Polaco','pl'),array(88,'Pashto/Pushto','ps'),array(89,'Portugués','pt'),array(90,'Quechua','qu'),array(91,'Rhaeto-Romance','rm'),array(92,'Kirundi','rn'),array(93,'Rumano','ro'),array(94,'Ruso','ru'),array(95,'Kinyarwanda','rw'),array(96,'Sanskrit','sa'),array(97,'Sindhi','sd'),array(98,'Sangro','sg'),array(99,'Serbo-Croata','sh'),array(100,'Singhalese','si'),array(101,'Slovak','sk'),array(102,'Slovenian','sl'),array(103,'Samoan','sm'),array(104,'Shona','sn'),array(105,'Somali','so'),array(106,'Albanés','sq'),array(107,'Serbian','sr'),array(108,'Siswati','ss'),array(109,'Sesotho','st'),array(110,'Sundanese','su'),array(111,'Sueco','sv'),array(112,'Swahili','sw'),array(113,'Tamil','ta'),array(114,'Telugu','te'),array(115,'Tajik','tg'),array(116,'Thai','th'),array(117,'Tigrinya','ti'),array(118,'Turkmen','tk'),array(119,'Tagalog','tl'),array(120,'Setswana','tn'),array(121,'Tonga','to'),array(122,'Turco','tr'),array(123,'Tsonga','ts'),array(124,'Tatar','tt'),array(125,'Twi','tw'),array(126,'Ucraniano','uk'),array(127,'Urdu','ur'),array(128,'Uzbek','uz'),array(129,'Vietnamita','vi'),array(130,'Volapuk','vo'),array(131,'Wolof','wo'),array(132,'Xhosa','xh'),array(133,'Yoruba','yo'),array(134,'Chino','zh'),array(135,'Zulu','zu'));

foreach ($array as $i) {
	\DB::table('languages')->insert([
    	'language' => $i[1],
		'iso_639-1' => $i[2],
        'created_at' => date('YmdHms')
    ]);
	}
}
}