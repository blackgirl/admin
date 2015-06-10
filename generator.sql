--
CREATE DATABASE IF NOT EXISTS `unicreo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `unicreo`;
--

---------------------------------------------------------- 

--
-- Table structure for table `uni_members`
--

CREATE TABLE `uni_members` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fullname` tinytext
);

--
-- Dumping data for table `uni_members`
--

INSERT INTO `uni_members` (`id`, `username`, `password`, `email`, `fullname`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'Administrator'),
(2, 'root', 'root', 'root@root.com', 'Root Root'),
(3, 'unicreo', '12341234', 'unicreo@gmail.com', 'Unicreo Co');


--
-- Table structure for table `uni_projects`
--

CREATE TABLE `uni_projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dnv` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `link` varchar(150) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `keyftrs` varchar(300) DEFAULT NULL,
  `expertises` varchar(300) DEFAULT NULL,
  `technologies` varchar(300) DEFAULT NULL
);

--
-- Dumping data for table `uni_projects`
--

INSERT INTO `uni_projects` (`id`, `nda`, `title`, `link`, `description`, `keyftrs`, `expertises`, `technologies`) VALUES
(1, 0, 'BigLike', 'http://biglike.com.ua', 'BigLike is a discount catalogue and coupon-per-share-in-social-network service, which helps to find best deals and save money. Biglike is the best way of connecting brand, retailers with consumers through web, mobile and social channels.',
       'Personal control over the account both for business owners and for customers.|\r\nNumerous categories of discounts.|\r\nHighly functional desk bar. Customers can manage their discounts, companies - their offers.|\r\nIntegration with all the most popular social networks.',
       'E-commerce,Startup,Web Crawling,Retail Trade,Advertisement,Data Mining,Product Management,Marketing,SMM,Location-Based','.NET,Design,Html5,CSS 3,Responsive layout,C#,SQL Server,ASP.NET MVC,Bootstrap,jQuery,FB API'),
(2, 1, 'Code Manager', NULL, NULL,NULL,NULL, NULL),
(3, 0, 'Superman', NULL, '',NULL,NULL,NULL),
(4, 0, 'Promote', NULL, 'An integrated solution supporting the entire process of promotional planning, control and evaluation. It helps sales teams in setting up trade promotion programs more efficiently and effectively. ProMote includes powerfull sales statistics analysis tools and modules, simplifies communication with retailers.','Layered data access architecture.|\r\nData change tracking layer, based on triggers.|\r\nCustom export to Excel, Word, PDF.|\r\nSeparate per customer application configuration. |\r\nOn-fly time based data analysis and visualization. |\r\nAutomated remote application deployment and updating.|\r\nCalculation of baseline sales and analysis of sales uplift per promotion, retailer, promotion type.','CRM,Warehouse,Retail Trade,Logistics,Advertisement,Data Mining,ERP', '.NET Framework 2.0 ,Visual Studio 2005 ,MS SQL Server ,VB .NET ,Component One™ Win Forms controls ,MS Office Interop'),
(5, 0, 'KarriereStart.no', 'www.karrierestart.no', 'KarrieresStart is a leading Norwegian job portal which was made both for people who are searching for a job and companies. It\'s known more than 80% of jobs are never advertised, it is evident that many job seekers miss the best career opportunities and employers miss the best candidates. KarriereStart helps to prevent these statistics.','Search vacancies or candidates based numerous criteria such as experience, skills, location, education, previous positions etc.|\r\nSubscriptions for companies\' latest news and regular updates of vacancies allow companies and candidates to keep in touch.|\r\nIn-depth analysis evaluates candidate’s suitability for the vacancy.|\r\nAdding videos to profile from a webcam.|\r\nCreating complex CV, including videos, photos, presentations etc.|\r\nPowerful admin panel for companies, which lets to keep in touch with candidates, post latest news, upcoming events, new vacancies etc.|\r\nAbility to use the portal for companies as a media publisher (company\'s news feed).','Media,Web Crawling,Recruitment,HR,Matching Algorithms','.NET,Design,HTML,HTML 5,CSS,СSS 3,C#,SQL Server,ASP.NET MVC,Windows Desktop,JavaScript,jQuery,FB API,LinkedIn API'),
(7, 0, 'UniScheduler', NULL, 'UniScheduler is business client-server software which combines business processes modeling, planning, scheduling, and CRM functions. The aim of UniScheduler is an ability to handle any kind of business planning and accurate scheduling. UniScheduler has business process designer which gives an ability to use enhanced kind of flowchart diagram.','Business processes designer.|\r\nTasks chains based on business processes template.|\r\nConfigurable:|\r\ncustomer’s data |\r\nreports |\r\nAny amount of data can be filled for each customer using advanced questionnaires.','CRM,Business Process Automation,Task Management,Warehouse,Cashflow,Logistics,ERP','.NET Framework 2.0 ,Visual Studio 2005 ,Win Forms ,DevExpress XPO'),
(8, 1, 'SFTY', NULL, 'Sfty is a social networking which was created for security purposes. The aim of this project is to help people feel safer with help of smartphone. Mobile application is stocked with three main buttons: alarm, follow me and friends. Once alarm was activated it can be triggered with a single press or by pulling out a headset from the phone.','Sfty platform supports adding new secure services, such as house alarm, fire alarm, etc.|\r\nIntegration with hardware device for home use.|\r\nFunction of insert photo at the beginning of user’s route.|\r\nAutomatic alerts - send an alert out to user’s emergency contacts via application, Facebook, SMS or email.|\r\nGPS-tracking - provide contacts with your location via GPS real time recording. Route can be tracked on mobile application or website.','Hardware Startup,Startup,Prototyping', 'Design,HTML5,CSS 3,Responsive layout,MySQL,Ruby on Rails,Bootstrap,jQuery,Google API,FB API ,iOs,Android'),
(9, 1, 'Viamo', NULL, 'Viamo is an application that recognizes TV channels only in 10 seconds in online mode. Application identifies channel by listening to it, then matching what it hears with a database collection of different channels. You just need to enable application, and as soon as it is switched, Viamo starts to scan TV channel.','Support of mobile applications.|\r\nPossibility of high load.|\r\nSupport recording of audio formats.|\r\nAudio recognition on-the-fly.','Startup,Advertisement,Heuristic Algorithms,CMS,Social Networking,Matching Algorithms,Multimedia Algorithms', '.NET 4.5,ASP.Net MVC 4,MS SQL Server,Bootstrap,HTML 5,CSS 3'),
(10, 0, 'Uniteam', NULL, 'Uniteam is task and issue tracker with the possibility of accounting calculations. It was created for those who value their time and resources. The aim of software is to cover work processes inside service companies. Uniteam helps to manage all the processes of business, including managing current projects, tasks, work-time and finances.',
       'Management sections with current projects, work-time, finances etc.|\r\nAccounting calculations.|\r\nEasy-in-use interface.',
       'Business Process Automation,Task Management,Cashflow,Prototyping', '.NET,HTML5,CSS 3,SQL Server,ASP.NET MVC,Bootstrap,jQuery'),
(11, 0, 'Techsheets', NULL, 'Techsheets is an online program for the formation products\' technical documentation. This workplace was designed for marketers. It makes workflow between the manufacturer and the retailer easier and faster. Techsheets protects all documents and reduces the risks of information leakage.',
       'Support of all office documents.|\r\nManager of contacts and products.|\r\nSimple, user-friendly interface.|\r\nSafe storage of information about products.',
        'Warehouse,Retail Trade,Data Mining,Prototyping', '.NET 4.0,Silverlight,MS SQL Server'),
(12, 0, 'RFT Manager', NULL, 'RFP Manager is a tool for extracting and tracking business leads from legal RFPs (request for proposal), including communication, to do items, and documents. Software was developed for a comfortable communicating within the company. Manager performs tasks such as import of documents, online document separation for different responsible departments.',
       'Safe storage of information.|\r\nMulti-using.|\r\nIntelligent processing of documents.|\r\nThe ability of editing documents online.|\r\nFunctional, user-friendly interface.',
        'Business Process Automation,Task Management,Document Flow', '.NET,C#,SQL Server,Windows Desktop'),
(13, 1, 'NdorseIt', NULL, 'NdorseIt is a discount system for sharing in social networks. It\'s an innovative marketing tool which leverages social media to deliver marketing messages through \'Word of mouth\'. The aim is to communicate with target audience and expand sales in a new effective way.',
       'Single time use of discount only, no discount will be given if they already liked.|\r\nMobile app integration.|\r\nDynamic mobile app localization.|\r\nIntegration with social networks.',
        'E-commerce,Startup,Advertisement,Marketing,SMM', '.NET 4,ASP.Net MVC 4,Razor,jQuery,Facebook API,Twitter API,Google Maps API,EF,MS SQL Server'),
(14, 0, 'Guest Me', NULL, 'Guest Me is a network for frequent flying people, which allows to share invites in airport lounges. Service helps travellers to find each other, through sharing invitation to lounges and VIP airport areas.',
       'Website includes personal account with list of completed flights, information about lounges, user reviews etc.|\r\nMatching algorithms.|\r\nIntegration with scheduling platforms, such as TripIt.',
        'Startup,Web Crawling,Real Estate,Prototyping,Social Networking,Matching Algorithms,Travel', '.NET,Design,HTML,CSS,C#,SQL Server,ASP.NET MVC,Google API,FB API,LinkedIn API'),
(15, 0, 'Golden Eye', NULL,
        'Golden Eye is software which provides analysis request for streaming prices and market conditions. Golden Eye allows to operate own sales and purchase information. This business desktop software collects product information, sales, pricing, management, companies\' contacts and other data from different B2B sites, excel sheets and PDF files.',
        'Comfortable and functional UI which is adopted for easy data search and analysis.|\r\nOwn web-parsing framework that makes easy to parse specific websites.|\r\nIntegration of information from different sources to one place.|\r\nPossibility of storing data in few database types: Using ORM technology, Golden Eye can store its data in few database types, like MS SQL Server, Oracle, MySQL, etc.',
        'Web Crawling,Military Trade,Retail Trade,Logistics,Data Mining,Document Flow', '.NET Framework 2.0 ,Visual Studio 2005 ,Win Forms ,DevExpress XPO ,Oracle,MS SQL Server,MySQL,Postgre SQL,MS Access'),
(16, 0, 'Dynamic People', NULL, 'Dynamic People is a website which delivers services of recruitment and career counseling. Dynamic People connects recruiters with job seek',
       'Website consists of blocks for those who are looking for a job and for companies.|\r\nNews feed allows posting the latest news on the home page.|\r\nThere is a possibility to download a CV or create a new one using data from LinkedIn.|\r\nList of vacancies is connected with third party website.',
        'Recruitment,HR,CMS', 'Wordpress'),
(17, 0, 'CreoSketch', NULL, 'CreoSketch is a tool for prototyping UI which is easy to use so you could reveal creativity without any obstacles. CreoSketch makes it easier to build simple, high precision prototypes that look like the real thing.',
        'UI prototyping.|\r\nThe tool keeps all data up-to-date in the background.|\r\nUML which offers a standard way to visualize a system\'s architectural blueprints, including different elements.|\r\nShare and collaborate with others in real-time.',
        'Startup,Prototyping', '.NET 3.5,Silverlight'),
(18, 0, 'Creo CMS', NULL, 'Creo CMS is a fully customizable proprietary web content management system. System\'s aim is a quick development of website without using other CMS. Creo CMS is a solution which allows being independent from third parties. Opposite to general-purpose CMS system reduces time and costs for staff trainings.',
       'Support for multiple languages and content translation.|\r\nSupport for portals with multiple domains.|\r\nFlexible user access restriction.|\r\nClear content editing and management.|\r\nAutomated navigation and friendly URLs.|\r\nRSS feeds generation.|\r\nCEO tools integration.|\r\nModular structure.',
        'CMS', '.NET,HTML,CSS,C#,SQL Server,ASP.NET Web Forms,JavaScript'),
(19, 0, 'Bigbase', NULL, 'Bigbase is a home and real estate marketplace which collects all of the best offers in one place. It assists homeowners, home buyers, sellers, renters, real estate agents in finding information about new listed offers. System monitors ads available online and assorts them into different sections.',
        'Easy-to-use and navigate.|\r\nHeuristic rating algorithm allows ranging the most suitable ads.|\r\nReal-time monitoring biggest real estate websites.|\r\nPowerful and flexible search with lots of parameters.',
        'Startup,Web Crawling,Real Estate,Heuristic Algorithms,Prototyping',
        '.NET,Html,CSS,C#,SQL Server,jQuery,High load optimization'),
(20, 0, 'Artmobile', NULL, 'Artmobile is a software complex developed for mobile phone repair shop. All of them have an installed copy of stocktaking subsystem, which synchronizes stocktaking data and main office automatically via email. This function makes communication between main office and distributors easier and more efficient.',
       'UI is adapted for rapid data entry.|\r\nDocument based accounting.|\r\nMultiple stocks support.|\r\nMultiple pricing strategies. |\r\nAutomated email based data replication.|\r\nSimplified product ordering tool.',
        'Stocktaking,E-commerce', 'MS SQL Server ,Delphi 7 ,DevExpress VCL Controls ,Fast Report ,.NET Framework 2.0 ,Visual Studio 2005 ,DevExpress'),
(21, 0, 'Appletree', 'www.epletreet.no', 'Appletree is a promotional game which is available in web and on mobile devices. The main task of the project is to promote a new product with help of exciting game. Players have to choose quality apples among rotten ones and mark them with stickers while apples are falling with increasing speed and complexity. Best three get prizes in the end of promo campaign.',
       'Highly effective promotional gameplay.|\r\nMobile devices support.|\r\nHeuristic fraud detection algorithm.|\r\nPlayer rankings based on points.|\r\nRegistration for further winning of prizes.|\r\n',
        'Advertisement,Gaming', 'Javascript ,jQuery,ASP.Net MVC,MS SQL Server'),
(22, 0, 'Activity Monitor', NULL,
        'Acivity Monitor manages employees and working activities remotely all over the world. Program was developed for achieving the highest usability and efficiency of tracking remote employers\' requests, activities, etc. Integral graphic editor builds graphic charts based on existing data.',
        'Optimized user interaction intended for reducing amount of clicks required for booking actions.|\r\nComprehensive graphic charts for statistic reports.|\r\nOutlook like UI framework.|\r\nUsing of MS Access as data storage provider, instead of MS SQL Server, reduces costs for database administration.',
        'Business Process Automation,Warehouse',
        '.NET Framework 2.0 ,Visual Studio 2005 ,MS Access ,VB .NET ,Component One™ Win Forms controls'),
(23, 0, 'Ad2Share', NULL,
        'Ad2Share is a discount system which helps to increase sales as well as improve social presence of the firm on the market. Ad2Share was created to help companies increase their social networking and at the same time improve sales through giving discounts to customers.',
        'Discount will automatically apply once user likes or shares a deal through available social networks.|\r\nSingle time use of discount only, no discount will be given if they already liked.|\r\nIntegrated major social networking sites (Facebook, Twitter).|\r\nMobile application.',
        'E-commerce,Startup,Advertisement,Marketing,SMM,Prototyping',
        '.NET 4,ASP.Net MVC 4,Razor,jQuery,Facebook API,Twitter API,Google Maps API,EF,MS SQL Server,Html5,CSS 3,Less,Bootstrap,jQuery  '),
(24, 0, 'Creoshtorm', NULL, 'Creoshtorm is a flexible tool which supports smartboards and mind mapping. The mind maps and charts it produces are simple and nice to create. Strong features help to be more productive and efficient using the tool.  You can model, document and restructure processes which typical enterprise uses to achieve its business goals.',
        'Easy-to-navigate user interface.|\r\nMultiple tools for building mind maps.|\r\nModel processes, information flows and data stores.',
        'Business process modeling', 'NET 3.5,Silverlight'),
(25, 0, 'GetWell', NULL, 'GetWell is a modern electronic health record system which provides an opportunity to conduct an electronic patient record and clinical data. The software provides the features which are needed to run practice smoothly. GetWeel  is easy to use with great customer service support.',
        'Support of various platforms.|\r\nThe system upports offline mode without data loss.|\r\nAttendance accounting system.|\r\nManual and auto-detection of payments.  Interaction with PRMI helps to determine the correct value of the services.|\r\nLarge amount of reports. And there\'s more to come.|\r\nA unique locking system of the patient\'s profile gives an opportunity to edit profile for two or more users at the same time. ',
        'Eye Care Services/ Ophthalmology', ' Postgresql,Ruby on Rails,Redis,CoffeeScript,Javascript,SCSS,CSS,HTML,PouchDB,WebSockets'),
(26, 0, 'Electronic Housekeeper',
        'www.electronichousekeeper.com',
        'Electronic housekeeper is a system for sales of electronic devices smart home. System provides support at all stages: from ordering and delivery to the user\'s device setup, technical support. Web-site includes web-shop, customer service area which allows to control the EH device online, technical support forum.',
        'Project includes web-site, web-based CRM application and system integration with Electronic Housekeeper devices network.|\r\nWeb-shop management.|\r\nContent management subsystem.|\r\nShopping cart with multiple currencies, delivery price calculation depending on customer’s location.|\r\nSupport for PayPal and DIBS payment systems.|\r\nUser area integrated with EH device network.|\r\nCustom-made support forum.|\r\nOrders handling, integrated with EH device network. The device activates and sets up after receiving a payment on order.|\r\nCustomer accounts management.|\r\nStock taking and planning system.|\r\nWebsite is localized in Danish and English.',
        'E-commerce,CRM,Smart House,Hardware Startup,Startup',
        '.NET,HTML,C#,Oracle,ASP.NET Web Forms,AJAX Control Toolkit,JavaScript'),
(27, 0, 'Monogram', NULL, 'Monogram is America''s leading, male-owned, matchmaking marriage service for wealthy men. Monogram was created for American businessmen, entrepreneurs and professionals who want to find a wife from Eastern Europe. Project includes luxury marriage agency website and management system which allows managing website content.',
      'Sophisticated matching algorithms.|\r\nManagement system.|\r\nOwn profiles for clients.',
        'Startup,Matching Algorithms', '.NET,Design,HTML,HTML 5,CSS,C#,SQL Server,ASP.NET MVC,FB API'),
(28, 0, 'Lopata', NULL, 'Lopata is a local web community with numerous subprojects. The goal of Lopata is to gather all spheres of life of the city in one place. On pages of website users can find directories, ads, maps and even online radio. Portal provides regularly updated, original news stories, city information and upcoming events.',
       'Separate sections of:|\r\nNews, bills, reviews, reportages, etc. |\r\nUser announcements, advertisements. |\r\nForums. |\r\nYellow pages for different cities.|\r\nPhoto galleries.|\r\nIntegrated advertisement system.|\r\nPersonal account for subscribers.|\r\nPossibility to subscribe to RSS feed.|\r\nHigh load optimization.',
        'Media', 'HTML,CSS,MySQL,PHP,JavaScript,jQuery'),
(29, 0, 'Jewels', NULL, 'Jewels is a stocktaking and customers relations managing application developed for jewelry store. The main aim of application is achieving the highest usability and efficiency of regular and frequently recurring tasks. System is designed to offer robust, secure and comprehensive solutions to real business needs.',
       'Custom database fuzzy search on products, customer information, dates etc. |\r\nOutlook like UI framework.|\r\nOptimized user interaction intended for reducing amount of clicks required for any action.',
        'Stocktaking', 'Component One™ Win Forms controls ,.NET Framework 2.0 ,Visual Studio 2005 ,MS SQL Server ,VB .NET ,Click Once'),
(30, 0, 'Jakten.no', NULL, 'Jakten.no is a unique location-based marketing campaign service. The aim of this project is to promote products and services. Jakten.no is a quest with a valuable prize in the finish. The quest starts with registration and then players get a map with marked places. The task is to reach these places outdoors and find a code which needs to be registered.',
       'Mobile application that is associated with the website.|\r\nMap which is integrated with Google.|\r\nRegistration via social networks.|\r\nUser-friendly interface.|\r\nApplication has only the most useful features, so it doesn’t take a lot of time to understand how to use it.',
        'Startup,Advertisement,Marketing,SMM,Location-Based', '.NET 4,MVC 3,Razor,jQuery,Facebook API,Google Maps API'),
(31, 0,'Swapcast','www.swapcast.com','Swapcast is a mix of Skype and browser which allows chatting and watching videos in the same window. The aim of the project is to make the discussion of videos easier and more enjoyable. Swapcast allows to record videos with sound, so that all your favorite moments can be saved.',
      'Video chat.|\r\nScreen sharing.|\r\nVideo recording with sound.|\r\nComponent of social networking.|\r\nMulti-platform support (PC, Mac, Android & iOS, Chromecast).',
      'Startup,Advertisement,Prototyping,Social Networking,Multimedia Algorithms,Chat','.NET,Design,HTML,CSS,C#,SQL Server,Windows Desktop,JavaScript'),
(32, 1,'Code Manager',NULL,'Code Manager was developed for managing, storing, preserving and delivering content and documents related to organizational processes. Enterprise web content management system  helps to structurize and process all data inside the company.  You can model, document and restructure processes which typical enterprise uses to achieve its business goals.',
      'Optimized user interface allows you to use software without additional training.|\r\nOnline and offline working without data loss.',
      'CMS','.Net ,ASP.Net Web Forms,Highload Optmization,SQL Server ,Transact SQL ,C#,HTML ,HTML 5,CSS ,CSS 3 ,Javascript ,JQuery,Visual Studio');

--
-- Table structure for table `uni_imgs`
--

CREATE TABLE `uni_imgs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file_name` varchar(1000) NOT NULL,
  `file_size` varchar(200) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `project_id` int(11) NOT NULL
);

--
-- Dumping data for table `uni_imgs`
--

INSERT INTO `uni_imgs` (`file_name`, `file_size`, `file_type`, `project_id`) VALUES
('portfolio/promote/promote1.jpg', '', 'image/jpeg', 4),
('portfolio/promote/promote3.jpg', '', 'image/jpeg', 4),
('portfolio/promote/promote2.jpg', '', 'image/jpeg', 4),
('portfolio/promote/promote4.jpg', '', 'image/jpeg', 4),
('portfolio/karrierestart/karrierestart2.jpg', '', 'image/jpeg', 5),
('portfolio/karrierestart/karrierestart1.jpg', '', 'image/jpeg', 5),
('portfolio/karrierestart/karrierestart3.jpg', '', 'image/jpeg', 5),
('portfolio/karrierestart/karrierestart4.jpg', '', 'image/jpeg', 5),
('portfolio/biglike/biglike1.jpg', '', 'image/jpeg', 1),
('portfolio/biglike/biglike4.jpg', '', 'image/jpeg', 1),
('portfolio/biglike/biglike2.jpg', '', 'image/jpeg', 1),
('portfolio/biglike/biglike3.jpg', '', 'image/jpeg', 1),
('portfolio/biglike/biglike5.jpg', '', 'image/jpeg', 1),
('portfolio/scheduler/scheduler1.jpg', '', 'image/jpeg', 7),
('portfolio/scheduler/scheduler2.jpg', '', 'image/jpeg', 7),
('portfolio/scheduler/scheduler3.jpg', '', 'image/jpeg', 7),
('portfolio/scheduler/scheduler4.jpg', '', 'image/jpeg', 7),
('portfolio/scheduler/scheduler5.jpg', '', 'image/jpeg', 7),
('portfolio/sfty/sfty4.jpg', '', 'image/jpeg', 8),
('portfolio/sfty/sfty1.jpg', '', 'image/jpeg', 8),
('portfolio/sfty/sfty2.jpg', '', 'image/jpeg', 8),
('portfolio/sfty/sfty3.jpg', '', 'image/jpeg', 8),
('portfolio/sfty/sfty5.jpg', '', 'image/jpeg', 8),
('portfolio/viamo/viamo4.jpg', '', 'image/jpeg', 9),
('portfolio/viamo/viamo3.jpg', '', 'image/jpeg', 9),
('portfolio/viamo/viamo2.jpg', '', 'image/jpeg', 9),
('portfolio/viamo/viamo1.jpg', '', 'image/jpeg', 9),
('portfolio/uniteam/uniteam4.jpg', '', 'image/jpeg', 10),
('portfolio/uniteam/uniteam3.jpg', '', 'image/jpeg', 10),
('portfolio/uniteam/uniteam2.jpg', '', 'image/jpeg', 10),
('portfolio/uniteam/uniteam1.jpg', '', 'image/jpeg', 10),
('portfolio/uniteam/uniteam5.jpg', '', 'image/jpeg', 10),
('portfolio/techsheets/techsheets5.jpg', '', 'image/jpeg', 11),
('portfolio/techsheets/techsheets4.jpg', '', 'image/jpeg', 11),
('portfolio/techsheets/techsheets3.jpg', '', 'image/jpeg', 11),
('portfolio/techsheets/techsheets2.jpg', '', 'image/jpeg', 11),
('portfolio/RFPmanager/RFPmanager3.jpg', '', 'image/jpeg', 12),
('portfolio/RFPmanager/RFPmanager2.jpg', '', 'image/jpeg', 12),
('portfolio/RFPmanager/RFPmanager1.jpg', '', 'image/jpeg', 12),
('portfolio/ndorseit/ndorseit4.jpg', '', 'image/jpeg', 13),
('portfolio/ndorseit/ndorseit3.jpg', '', 'image/jpeg', 13),
('portfolio/ndorseit/ndorseit2.jpg', '', 'image/jpeg', 13),
('portfolio/ndorseit/ndorseit1.jpg', '', 'image/jpeg', 13),
('portfolio/ndorseit/ndorseit6.jpg', '', 'image/jpeg', 13),
('portfolio/ndorseit/ndorseit5.jpg', '', 'image/jpeg', 13),
('portfolio/monogram/monogram2.jpg', '', 'image/jpeg', 27),
('portfolio/monogram/monogram1.jpg', '', 'image/jpeg', 27),
('portfolio/monogram/monogram4.jpg', '', 'image/jpeg', 27),
('portfolio/monogram/monogram3.jpg', '', 'image/jpeg', 27),
('portfolio/lopata/lopata2.jpg', '', 'image/jpeg', 28),
('portfolio/lopata/lopata1.jpg', '', 'image/jpeg', 28),
('portfolio/lopata/lopata3.jpg', '', 'image/jpeg', 28),
('portfolio/jewels/jewels1.jpg', '', 'image/jpeg', 29),
('portfolio/jewels/jewels2.jpg', '', 'image/jpeg', 29),
('portfolio/jewels/jewels3.jpg', '', 'image/jpeg', 29),
('portfolio/jakten/jakten2.jpg', '', 'image/jpeg', 30),
('portfolio/jakten/jakten1.jpg', '', 'image/jpeg', 30),
('portfolio/jakten/jakten3.jpg', '', 'image/jpeg', 30),
('portfolio/guestme/guestme2.jpg', '', 'image/jpeg', 14),
('portfolio/guestme/guestme1.jpg', '', 'image/jpeg', 14),
('portfolio/guestme/guestme3.jpg', '', 'image/jpeg', 14),
('portfolio/goldeneye/goldeneye2.jpg', '', 'image/jpeg', 15),
('portfolio/goldeneye/goldeneye1.jpg', '', 'image/jpeg', 15),
('portfolio/elektronichousekeeper/elektronichousekeeper3.jpg', '', 'image/jpeg', 26),
('portfolio/elektronichousekeeper/elektronichousekeeper2.jpg', '', 'image/jpeg', 26),
('portfolio/elektronichousekeeper/elektronichousekeeper1.jpg', '', 'image/jpeg', 26),
('portfolio/elektronichousekeeper/elektronichousekeeper4.jpg', '', 'image/jpeg', 26),
('portfolio/dynamicpeople/dynamicpeople2.jpg', '', 'image/jpeg', 16),
('portfolio/dynamicpeople/dynamicpeople1.jpg', '', 'image/jpeg', 16),
('portfolio/dynamicpeople/dynamicpeople4.jpg', '', 'image/jpeg', 16),
('portfolio/dynamicpeople/dynamicpeople3.jpg', '', 'image/jpeg', 16),
('portfolio/creosketch/creosketch2.jpg', '', 'image/jpeg', 17),
('portfolio/creosketch/creosketch1.jpg', '', 'image/jpeg', 17),
('portfolio/creocms/creocms2.jpg', '', 'image/jpeg', 18),
('portfolio/creocms/creocms1.jpg', '', 'image/jpeg', 18),
('portfolio/creocms/creocms5.jpg', '', 'image/jpeg', 18),
('portfolio/creocms/creocms4.jpg', '', 'image/jpeg', 18),
('portfolio/creocms/creocms3.jpg', '', 'image/jpeg', 18),
('portfolio/bigbase/bigbase1.jpg', '', 'image/jpeg', 19),
('portfolio/bigbase/bigbase2.jpg', '', 'image/jpeg', 19),
('portfolio/artmobile/artmobile1.jpg', '', 'image/jpeg', 20),
('portfolio/artmobile/artmobile2.jpg', '', 'image/jpeg', 20),
('portfolio/artmobile/artmobile3.jpg', '', 'image/jpeg', 20),
('portfolio/appleetree/appleetree1.jpg', '', 'image/jpeg', 21),
('portfolio/appleetree/appleetree2.jpg', '', 'image/jpeg', 21),
('portfolio/appleetree/appleetree3.jpg', '', 'image/jpeg', 21),
('portfolio/activitymonitor/activitymonitor1.jpg', '', 'image/jpeg', 22),
('portfolio/activitymonitor/activitymonitor2.jpg', '', 'image/jpeg', 22),
('portfolio/activitymonitor/activitymonitor3.jpg', '', 'image/jpeg', 22),
('portfolio/ad2share/ad2share1.jpg', '', 'image/jpeg', 23),
('portfolio/ad2share/ad2share4.jpg', '', 'image/jpeg', 23),
('portfolio/ad2share/ad2share2.jpg', '', 'image/jpeg', 23),
('portfolio/ad2share/ad2share3.jpg', '', 'image/jpeg', 23),
('portfolio/creoshtorm/creoshtorm1.jpg', '', 'image/jpeg', 24),
('portfolio/creoshtorm/creoshtorm2.jpg', '', 'image/jpeg', 24),
('portfolio/getwell/getwell1.jpg', '', 'image/jpeg', 25),
('portfolio/getwell/getwell2.jpg', '', 'image/jpeg', 25),
('portfolio/getwell/getwell3.jpg', '', 'image/jpeg', 25),
('portfolio/getwell/getwell4.jpg', '', 'image/jpeg', 25),
('portfolio/getwell/getwell5.jpg', '', 'image/jpeg', 25),
('portfolio/getwell/getwell6.jpg', '', 'image/jpeg', 25),
('portfolio/getwell/getwell7.jpg', '', 'image/jpeg', 25),
('portfolio/swapcast/swapcast1.jpg', '', 'image/jpeg', 31),
('portfolio/swapcast/swapcast1.jpg', '', 'image/jpeg', 31);

--
-- Table structure for table `uni_technologies`
--

CREATE TABLE `uni_technologies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
);

--
-- Dumping data for table `uni_technologies`
--

INSERT INTO `uni_technologies` (`text`, `value`) VALUES
('Highload optimization', 'hlo'),
('.NET', 'net'),
('Design', 'design'),
('HTML', 'html'),
('HTML 5', 'html5'),
('CSS', 'css'),
('LESS', 'less'),
('CSS 3', 'css3'),
('SASS', 'sass'),
('Responsive layout', 'responsive'),
('C#', 'c'),
('VB.NET', 'vb'),
('SQL Server', 'sql'),
('MySql', 'mysql'),
('PHP', 'php'),
('Ruby on Rail', 'ruby'),
('Postgresql', 'postgre'),
('iOS', 'ios'),
('Android', 'android'),
('ASP.NET WebForms', 'webforms'),
('ASP.NET MVC', 'aspmvc'),
('Windows Desktop', 'windows'),
('Silverlight', 'silverlight'),
('PouchDB', 'pouch'),
('Bootstrap', 'bootstrap'),
('Javascript', 'js'),
('CoffeeScript', 'coffee'),
('jQuery', 'jquery'),
('Google API', 'google'),
('Facebook API', 'fbapi'),
('LinkedIn API', 'linkedin'),
('Twitter API', 'twiapi'),
('Razor', 'razor'),
('ASP.Net MVC 4', 'mvc'),
('Transact SQL', 'transact'),
('Visual Studio', 'vs'),
('MS Access', 'msaccess'),
('Win Forms controls', 'winforms'),
('WebSockets', 'websockets'),
('Delphi', 'delphi'),
('Oracle', 'oracle'),
('Adobe Flash', 'flash'),
('Varnish Cache', 'vcache'),
('ADO.NET', 'adonet'),
('ef', 'EF');

--
-- Table structure for table `uni_expertises`
--

CREATE TABLE `uni_expertises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
);

--
-- Dumping data for table `uni_expertises`
--

INSERT INTO `uni_expertises` (`text`) VALUES
('E-commerce'),
('Product Management'),
('Smart House'),
('Hardware Startup'),
('Startup'),
('Media'),
('Gaming'),
('Task Management'),
('Risk Assessment management'),
('Warehouse'),
('Cashflow'),
('Web Crawling'),
('Military Trade'),
('Retail Trade'),
('Logistics'),
('Advertisement'),
('Data Mining'),
('ERP'),
('Real Estate'),
('Heuristic Algorithms'),
('Marketing'),
('CRM'),
('SMM'),
('Location-Based'),
('Prototyping'),
('Recruitment'),
('HR'),
('CMS'),
('Social Networking'),
('Document Flow'),
('Matching Algorithms'),
('Travel'),
('Multimedia Algorithms'),
('Chat'),
('Stocktaking'),
('Accounting'),
('Business Process Automation');

--
-- Table structure for table `uni_offers`
--

CREATE TABLE `uni_offers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(800) NOT NULL,
  `link` varchar(250) NOT NULL,
  `estimation` varchar(300) NOT NULL
  `total` int(200) NOT NULL
);

--
-- Table structure for table `uni_offer_estimate`
--

CREATE TABLE `uni_offer_estimate` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `task` varchar(500) NOT NULL,
  `hours` int(50) NOT NULL,
  `cost` int(100) NOT NULL
);

--
-- -- Table structure for table `uni_offer_cases`
--
CREATE TABLE `unicreo`.`uni_offer_cases` ( `id` INT NOT NULL AUTO_INCREMENT , `file_name` VARCHAR(1000) NOT NULL , `file_size` VARCHAR(150) NULL DEFAULT NULL , `file_type` VARCHAR(150) NULL DEFAULT NULL , `offer_id` INT NOT NULL , PRIMARY KEY (`id`));
