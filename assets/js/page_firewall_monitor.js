var countries = [{"name":"Andorra","lat":"42.546245","lon":"1.601554"},{"name":"United Arab Emirates","lat":"23.424076","lon":"53.847818"},{"name":"Afghanistan","lat":"33.93911","lon":"67.709953"},{"name":"Antigua and Barbuda","lat":"17.060816","lon":"-61.796428"},{"name":"Anguilla","lat":"18.220554","lon":"-63.068615"},{"name":"Albania","lat":"41.153332","lon":"20.168331"},{"name":"Armenia","lat":"40.069099","lon":"45.038189"},{"name":"Netherlands Antilles","lat":"12.226079","lon":"-69.060087"},{"name":"Angola","lat":"-11.202692","lon":"17.873887"},{"name":"Antarctica","lat":"-75.250973","lon":"-0.071389"},{"name":"Argentina","lat":"-38.416097","lon":"-63.616672"},{"name":"American Samoa","lat":"-14.270972","lon":"-170.132217"},{"name":"Austria","lat":"47.516231","lon":"14.550072"},{"name":"Australia","lat":"-25.274398","lon":"133.775136"},{"name":"Aruba","lat":"12.52111","lon":"-69.968338"},{"name":"Azerbaijan","lat":"40.143105","lon":"47.576927"},{"name":"Bosnia and Herzegovina","lat":"43.915886","lon":"17.679076"},{"name":"Barbados","lat":"13.193887","lon":"-59.543198"},{"name":"Bangladesh","lat":"23.684994","lon":"90.356331"},{"name":"Belgium","lat":"50.503887","lon":"4.469936"},{"name":"Burkina Faso","lat":"12.238333","lon":"-1.561593"},{"name":"Bulgaria","lat":"42.733883","lon":"25.48583"},{"name":"Bahrain","lat":"25.930414","lon":"50.637772"},{"name":"Burundi","lat":"-3.373056","lon":"29.918886"},{"name":"Benin","lat":"9.30769","lon":"2.315834"},{"name":"Bermuda","lat":"32.321384","lon":"-64.75737"},{"name":"Brunei","lat":"4.535277","lon":"114.727669"},{"name":"Bolivia","lat":"-16.290154","lon":"-63.588653"},{"name":"Brazil","lat":"-14.235004","lon":"-51.92528"},{"name":"Bahamas","lat":"25.03428","lon":"-77.39628"},{"name":"Bhutan","lat":"27.514162","lon":"90.433601"},{"name":"Bouvet Island","lat":"-54.423199","lon":"3.413194"},{"name":"Botswana","lat":"-22.328474","lon":"24.684866"},{"name":"Belarus","lat":"53.709807","lon":"27.953389"},{"name":"Belize","lat":"17.189877","lon":"-88.49765"},{"name":"Canada","lat":"56.130366","lon":"-106.346771"},{"name":"Cocos [Keeling] Islands","lat":"-12.164165","lon":"96.870956"},{"name":"Congo [DRC]","lat":"-4.038333","lon":"21.758664"},{"name":"Central African Republic","lat":"6.611111","lon":"20.939444"},{"name":"Congo [Republic]","lat":"-0.228021","lon":"15.827659"},{"name":"Switzerland","lat":"46.818188","lon":"8.227512"},{"name":"Côte d'Ivoire","lat":"7.539989","lon":"-5.54708"},{"name":"Cook Islands","lat":"-21.236736","lon":"-159.777671"},{"name":"Chile","lat":"-35.675147","lon":"-71.542969"},{"name":"Cameroon","lat":"7.369722","lon":"12.354722"},{"name":"China","lat":"35.86166","lon":"104.195397"},{"name":"Colombia","lat":"4.570868","lon":"-74.297333"},{"name":"Costa Rica","lat":"9.748917","lon":"-83.753428"},{"name":"Cuba","lat":"21.521757","lon":"-77.781167"},{"name":"Cape Verde","lat":"16.002082","lon":"-24.013197"},{"name":"Christmas Island","lat":"-10.447525","lon":"105.690449"},{"name":"Cyprus","lat":"35.126413","lon":"33.429859"},{"name":"Czech Republic","lat":"49.817492","lon":"15.472962"},{"name":"Germany","lat":"51.165691","lon":"10.451526"},{"name":"Djibouti","lat":"11.825138","lon":"42.590275"},{"name":"Denmark","lat":"56.26392","lon":"9.501785"},{"name":"Dominica","lat":"15.414999","lon":"-61.370976"},{"name":"Dominican Republic","lat":"18.735693","lon":"-70.162651"},{"name":"Algeria","lat":"28.033886","lon":"1.659626"},{"name":"Ecuador","lat":"-1.831239","lon":"-78.183406"},{"name":"Estonia","lat":"58.595272","lon":"25.013607"},{"name":"Egypt","lat":"26.820553","lon":"30.802498"},{"name":"Western Sahara","lat":"24.215527","lon":"-12.885834"},{"name":"Eritrea","lat":"15.179384","lon":"39.782334"},{"name":"Spain","lat":"40.463667","lon":"-3.74922"},{"name":"Ethiopia","lat":"9.145","lon":"40.489673"},{"name":"Finland","lat":"61.92411","lon":"25.748151"},{"name":"Fiji","lat":"-16.578193","lon":"179.414413"},{"name":"Falkland Islands [Islas Malvinas]","lat":"-51.796253","lon":"-59.523613"},{"name":"Micronesia","lat":"7.425554","lon":"150.550812"},{"name":"Faroe Islands","lat":"61.892635","lon":"-6.911806"},{"name":"France","lat":"46.227638","lon":"2.213749"},{"name":"Gabon","lat":"-0.803689","lon":"11.609444"},{"name":"United Kingdom","lat":"55.378051","lon":"-3.435973"},{"name":"Grenada","lat":"12.262776","lon":"-61.604171"},{"name":"Georgia","lat":"42.315407","lon":"43.356892"},{"name":"French Guiana","lat":"3.933889","lon":"-53.125782"},{"name":"Guernsey","lat":"49.465691","lon":"-2.585278"},{"name":"Ghana","lat":"7.946527","lon":"-1.023194"},{"name":"Gibraltar","lat":"36.137741","lon":"-5.345374"},{"name":"Greenland","lat":"71.706936","lon":"-42.604303"},{"name":"Gambia","lat":"13.443182","lon":"-15.310139"},{"name":"Guinea","lat":"9.945587","lon":"-9.696645"},{"name":"Guadeloupe","lat":"16.995971","lon":"-62.067641"},{"name":"Equatorial Guinea","lat":"1.650801","lon":"10.267895"},{"name":"Greece","lat":"39.074208","lon":"21.824312"},{"name":"South Georgia and the South Sandwich Islands","lat":"-54.429579","lon":"-36.587909"},{"name":"Guatemala","lat":"15.783471","lon":"-90.230759"},{"name":"Guam","lat":"13.444304","lon":"144.793731"},{"name":"Guinea-Bissau","lat":"11.803749","lon":"-15.180413"},{"name":"Guyana","lat":"4.860416","lon":"-58.93018"},{"name":"Gaza Strip","lat":"31.354676","lon":"34.308825"},{"name":"Hong Kong","lat":"22.396428","lon":"114.109497"},{"name":"Heard Island and McDonald Islands","lat":"-53.08181","lon":"73.504158"},{"name":"Honduras","lat":"15.199999","lon":"-86.241905"},{"name":"Croatia","lat":"45.1","lon":"15.2"},{"name":"Haiti","lat":"18.971187","lon":"-72.285215"},{"name":"Hungary","lat":"47.162494","lon":"19.503304"},{"name":"Indonesia","lat":"-0.789275","lon":"113.921327"},{"name":"Ireland","lat":"53.41291","lon":"-8.24389"},{"name":"Israel","lat":"31.046051","lon":"34.851612"},{"name":"Isle of Man","lat":"54.236107","lon":"-4.548056"},{"name":"India","lat":"20.593684","lon":"78.96288"},{"name":"British Indian Ocean Territory","lat":"-6.343194","lon":"71.876519"},{"name":"Iraq","lat":"33.223191","lon":"43.679291"},{"name":"Iran","lat":"32.427908","lon":"53.688046"},{"name":"Iceland","lat":"64.963051","lon":"-19.020835"},{"name":"Italy","lat":"41.87194","lon":"12.56738"},{"name":"Jersey","lat":"49.214439","lon":"-2.13125"},{"name":"Jamaica","lat":"18.109581","lon":"-77.297508"},{"name":"Jordan","lat":"30.585164","lon":"36.238414"},{"name":"Japan","lat":"36.204824","lon":"138.252924"},{"name":"Kenya","lat":"-0.023559","lon":"37.906193"},{"name":"Kyrgyzstan","lat":"41.20438","lon":"74.766098"},{"name":"Cambodia","lat":"12.565679","lon":"104.990963"},{"name":"Kiribati","lat":"-3.370417","lon":"-168.734039"},{"name":"Comoros","lat":"-11.875001","lon":"43.872219"},{"name":"Saint Kitts and Nevis","lat":"17.357822","lon":"-62.782998"},{"name":"North Korea","lat":"40.339852","lon":"127.510093"},{"name":"South Korea","lat":"35.907757","lon":"127.766922"},{"name":"Kuwait","lat":"29.31166","lon":"47.481766"},{"name":"Cayman Islands","lat":"19.513469","lon":"-80.566956"},{"name":"Kazakhstan","lat":"48.019573","lon":"66.923684"},{"name":"Laos","lat":"19.85627","lon":"102.495496"},{"name":"Lebanon","lat":"33.854721","lon":"35.862285"},{"name":"Saint Lucia","lat":"13.909444","lon":"-60.978893"},{"name":"Liechtenstein","lat":"47.166","lon":"9.555373"},{"name":"Sri Lanka","lat":"7.873054","lon":"80.771797"},{"name":"Liberia","lat":"6.428055","lon":"-9.429499"},{"name":"Lesotho","lat":"-29.609988","lon":"28.233608"},{"name":"Lithuania","lat":"55.169438","lon":"23.881275"},{"name":"Luxembourg","lat":"49.815273","lon":"6.129583"},{"name":"Latvia","lat":"56.879635","lon":"24.603189"},{"name":"Libya","lat":"26.3351","lon":"17.228331"},{"name":"Morocco","lat":"31.791702","lon":"-7.09262"},{"name":"Monaco","lat":"43.750298","lon":"7.412841"},{"name":"Moldova","lat":"47.411631","lon":"28.369885"},{"name":"Montenegro","lat":"42.708678","lon":"19.37439"},{"name":"Madagascar","lat":"-18.766947","lon":"46.869107"},{"name":"Marshall Islands","lat":"7.131474","lon":"171.184478"},{"name":"Macedonia [FYROM]","lat":"41.608635","lon":"21.745275"},{"name":"Mali","lat":"17.570692","lon":"-3.996166"},{"name":"Myanmar [Burma]","lat":"21.913965","lon":"95.956223"},{"name":"Mongolia","lat":"46.862496","lon":"103.846656"},{"name":"Macau","lat":"22.198745","lon":"113.543873"},{"name":"Northern Mariana Islands","lat":"17.33083","lon":"145.38469"},{"name":"Martinique","lat":"14.641528","lon":"-61.024174"},{"name":"Mauritania","lat":"21.00789","lon":"-10.940835"},{"name":"Montserrat","lat":"16.742498","lon":"-62.187366"},{"name":"Malta","lat":"35.937496","lon":"14.375416"},{"name":"Mauritius","lat":"-20.348404","lon":"57.552152"},{"name":"Maldives","lat":"3.202778","lon":"73.22068"},{"name":"Malawi","lat":"-13.254308","lon":"34.301525"},{"name":"Mexico","lat":"23.634501","lon":"-102.552784"},{"name":"Malaysia","lat":"4.210484","lon":"101.975766"},{"name":"Mozambique","lat":"-18.665695","lon":"35.529562"},{"name":"Namibia","lat":"-22.95764","lon":"18.49041"},{"name":"New Caledonia","lat":"-20.904305","lon":"165.618042"},{"name":"Niger","lat":"17.607789","lon":"8.081666"},{"name":"Norfolk Island","lat":"-29.040835","lon":"167.954712"},{"name":"Nigeria","lat":"9.081999","lon":"8.675277"},{"name":"Nicaragua","lat":"12.865416","lon":"-85.207229"},{"name":"Netherlands","lat":"52.132633","lon":"5.291266"},{"name":"Norway","lat":"60.472024","lon":"8.468946"},{"name":"Nepal","lat":"28.394857","lon":"84.124008"},{"name":"Nauru","lat":"-0.522778","lon":"166.931503"},{"name":"Niue","lat":"-19.054445","lon":"-169.867233"},{"name":"New Zealand","lat":"-40.900557","lon":"174.885971"},{"name":"Oman","lat":"21.512583","lon":"55.923255"},{"name":"Panama","lat":"8.537981","lon":"-80.782127"},{"name":"Peru","lat":"-9.189967","lon":"-75.015152"},{"name":"French Polynesia","lat":"-17.679742","lon":"-149.406843"},{"name":"Papua New Guinea","lat":"-6.314993","lon":"143.95555"},{"name":"Philippines","lat":"12.879721","lon":"121.774017"},{"name":"Pakistan","lat":"30.375321","lon":"69.345116"},{"name":"Poland","lat":"51.919438","lon":"19.145136"},{"name":"Saint Pierre and Miquelon","lat":"46.941936","lon":"-56.27111"},{"name":"Pitcairn Islands","lat":"-24.703615","lon":"-127.439308"},{"name":"Puerto Rico","lat":"18.220833","lon":"-66.590149"},{"name":"Palestinian Territories","lat":"31.952162","lon":"35.233154"},{"name":"Portugal","lat":"39.399872","lon":"-8.224454"},{"name":"Palau","lat":"7.51498","lon":"134.58252"},{"name":"Paraguay","lat":"-23.442503","lon":"-58.443832"},{"name":"Qatar","lat":"25.354826","lon":"51.183884"},{"name":"Réunion","lat":"-21.115141","lon":"55.536384"},{"name":"Romania","lat":"45.943161","lon":"24.96676"},{"name":"Serbia","lat":"44.016521","lon":"21.005859"},{"name":"Russia","lat":"61.52401","lon":"105.318756"},{"name":"Rwanda","lat":"-1.940278","lon":"29.873888"},{"name":"Saudi Arabia","lat":"23.885942","lon":"45.079162"},{"name":"Solomon Islands","lat":"-9.64571","lon":"160.156194"},{"name":"Seychelles","lat":"-4.679574","lon":"55.491977"},{"name":"Sudan","lat":"12.862807","lon":"30.217636"},{"name":"Sweden","lat":"60.128161","lon":"18.643501"},{"name":"Singapore","lat":"1.352083","lon":"103.819836"},{"name":"Saint Helena","lat":"-24.143474","lon":"-10.030696"},{"name":"Slovenia","lat":"46.151241","lon":"14.995463"},{"name":"Svalbard and Jan Mayen","lat":"77.553604","lon":"23.670272"},{"name":"Slovakia","lat":"48.669026","lon":"19.699024"},{"name":"Sierra Leone","lat":"8.460555","lon":"-11.779889"},{"name":"San Marino","lat":"43.94236","lon":"12.457777"},{"name":"Senegal","lat":"14.497401","lon":"-14.452362"},{"name":"Somalia","lat":"5.152149","lon":"46.199616"},{"name":"Suriname","lat":"3.919305","lon":"-56.027783"},{"name":"São Tomé and Príncipe","lat":"0.18636","lon":"6.613081"},{"name":"El Salvador","lat":"13.794185","lon":"-88.89653"},{"name":"Syria","lat":"34.802075","lon":"38.996815"},{"name":"Swaziland","lat":"-26.522503","lon":"31.465866"},{"name":"Turks and Caicos Islands","lat":"21.694025","lon":"-71.797928"},{"name":"Chad","lat":"15.454166","lon":"18.732207"},{"name":"French Southern Territories","lat":"-49.280366","lon":"69.348557"},{"name":"Togo","lat":"8.619543","lon":"0.824782"},{"name":"Thailand","lat":"15.870032","lon":"100.992541"},{"name":"Tajikistan","lat":"38.861034","lon":"71.276093"},{"name":"Tokelau","lat":"-8.967363","lon":"-171.855881"},{"name":"Timor-Leste","lat":"-8.874217","lon":"125.727539"},{"name":"Turkmenistan","lat":"38.969719","lon":"59.556278"},{"name":"Tunisia","lat":"33.886917","lon":"9.537499"},{"name":"Tonga","lat":"-21.178986","lon":"-175.198242"},{"name":"Turkey","lat":"38.963745","lon":"35.243322"},{"name":"Trinidad and Tobago","lat":"10.691803","lon":"-61.222503"},{"name":"Tuvalu","lat":"-7.109535","lon":"177.64933"},{"name":"Taiwan","lat":"23.69781","lon":"120.960515"},{"name":"Tanzania","lat":"-6.369028","lon":"34.888822"},{"name":"Ukraine","lat":"48.379433","lon":"31.16558"},{"name":"Uganda","lat":"1.373333","lon":"32.290275"},{"name":"U.S. Minor Outlying Islands","lat":"","lon":""},{"name":"United States","lat":"37.09024","lon":"-95.712891"},{"name":"Uruguay","lat":"-32.522779","lon":"-55.765835"},{"name":"Uzbekistan","lat":"41.377491","lon":"64.585262"},{"name":"Vatican City","lat":"41.902916","lon":"12.453389"},{"name":"Saint Vincent and the Grenadines","lat":"12.984305","lon":"-61.287228"},{"name":"Venezuela","lat":"6.42375","lon":"-66.58973"},{"name":"British Virgin Islands","lat":"18.420695","lon":"-64.639968"},{"name":"U.S. Virgin Islands","lat":"18.335765","lon":"-64.896335"},{"name":"Vietnam","lat":"14.058324","lon":"108.277199"},{"name":"Vanuatu","lat":"-15.376706","lon":"166.959158"},{"name":"Wallis and Futuna","lat":"-13.768752","lon":"-177.156097"},{"name":"Samoa","lat":"-13.759029","lon":"-172.104629"},{"name":"Kosovo","lat":"42.602636","lon":"20.902977"},{"name":"Yemen","lat":"15.552727","lon":"48.516388"},{"name":"Mayotte","lat":"-12.8275","lon":"45.166244"},{"name":"South Africa","lat":"-30.559482","lon":"22.937506"},{"name":"Zambia","lat":"-13.133897","lon":"27.849332"},{"name":"Zimbabwe","lat":"-19.015438","lon":"29.154857"}];
var crawlers = [
    {
        "pattern": "Googlebot",
        "url": "http://www.google.com/bot.html"
    },
    {
        "pattern": "Googlebot-Mobile"
    },
    {
        "pattern": "Googlebot-Image"
    },
    {
        "pattern": "Googlebot-News"
    },
    {
        "pattern": "Googlebot-Video"
    },
    {
        "pattern": "AdsBot-Google",
        "url": "https://support.google.com/webmasters/answer/1061943?hl=en"
    },
    {
        "pattern": "Mediapartners-Google",
        "url": "https://support.google.com/webmasters/answer/1061943?hl=en"
    },
    {
        "pattern": "bingbot",
        "url": "http://www.bing.com/bingbot.htm"
    },
    {
        "pattern": "slurp",
        "url": "http://help.yahoo.com/help/us/ysearch/slurp"
    },
    {
        "pattern": "java"
    },
    {
        "pattern": "wget"
    },
    {
        "pattern": "curl"
    },
    {
        "pattern": "Commons-HttpClient"
    },
    {
        "pattern": "Python-urllib"
    },
    {
        "pattern": "libwww"
    },
    {
        "pattern": "httpunit"
    },
    {
        "pattern": "nutch"
    },
    {
        "pattern": "Go-http-client",
        "addition_date": "2016/03/26",
        "url": "https://golang.org/pkg/net/http/",
        "instances": ["Go-http-client/1.1"]
    },
    {
        "pattern": "phpcrawl",
        "addition_date": "2012-09/17",
        "url": "http://phpcrawl.cuab.de/"
    },
    {
        "pattern": "msnbot",
        "url": "http://search.msn.com/msnbot.htm"
    },
    {
        "pattern": "jyxobot"
    },
    {
        "pattern": "FAST-WebCrawler"
    },
    {
        "pattern": "FAST Enterprise Crawler"
    },
    {
        "pattern": "biglotron"
    },
    {
        "pattern": "teoma"
    },
    {
        "pattern": "convera"
    },
    {
        "pattern": "seekbot"
    },
    {
        "pattern": "gigabot",
        "instances": ["Gigabot/1.0", "Gigabot/2.0 (http://www.gigablast.com/spider.html)", "Gigabot/2.0 (http://www.gigablast.com/spider.html)"],
        "url": "https://github.com/gigablast/open-source-search-engine"
    },
    {
        "pattern": "gigablast",
        "instances": ["GigablastOpenSource/1.0"],
        "url": "https://github.com/gigablast/open-source-search-engine"
    },
    {
        "pattern": "exabot"
    },
    {
        "pattern": "ngbot"
    },
    {
        "pattern": "ia_archiver"
    },
    {
        "pattern": "GingerCrawler"
    },
    {
        "pattern": "webmon "
    },
    {
        "pattern": "httrack"
    },
    {
        "pattern": "webcrawler"
    },
    {
        "pattern": "grub.org"
    },
    {
        "pattern": "UsineNouvelleCrawler"
    },
    {
        "pattern": "antibot"
    },
    {
        "pattern": "netresearchserver"
    },
    {
        "pattern": "speedy"
    },
    {
        "pattern": "fluffy"
    },
    {
        "pattern": "bibnum.bnf"
    },
    {
        "pattern": "findlink"
    },
    {
        "pattern": "msrbot"
    },
    {
        "pattern": "panscient"
    },
    {
        "pattern": "yacybot"
    },
    {
        "pattern": "AISearchBot"
    },
    {
        "pattern": "IOI"
    },
    {
        "pattern": "ips-agent"
    },
    {
        "pattern": "tagoobot"
    },
    {
        "pattern": "MJ12bot"
    },
    {
        "pattern": "dotbot"
    },
    {
        "pattern": "woriobot"
    },
    {
        "pattern": "yanga"
    },
    {
        "pattern": "buzzbot"
    },
    {
        "pattern": "mlbot"
    },
    {
        "pattern": "yandexbot",
        "url": "http://yandex.com/bots",
        "instances": ["Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)"],
        "addition_date": "2015/04/14"
    },
    {
        "pattern": "purebot",
        "addition_date": "2010/01/19"
    },
    {
        "pattern": "Linguee Bot",
        "addition_date": "2010/01/26",
        "url": "http://www.linguee.com/bot"
    },
    {
        "pattern": "Voyager",
        "addition_date": "2010/02/01",
        "url": "http://www.kosmix.com/crawler.html"
    },
    {
        "pattern": "CyberPatrol",
        "addition_date": "2010/02/11",
        "url": "http://www.cyberpatrol.com/cyberpatrolcrawler.asp"
    },
    {
        "pattern": "voilabot",
        "addition_date": "2010/05/18"
    },
    {
        "pattern": "baiduspider",
        "addition_date": "2010/07/15",
        "url": "http://www.baidu.jp/spider/"
    },
    {
        "pattern": "citeseerxbot",
        "addition_date": "2010/07/17"
    },
    {
        "pattern": "spbot",
        "addition_date": "2010/07/31",
        "url": "http://www.seoprofiler.com/bot"
    },
    {
        "pattern": "twengabot",
        "addition_date": "2010/08/03",
        "url": "http://www.twenga.com/bot.html"
    },
    {
        "pattern": "postrank",
        "addition_date": "2010/08/03",
        "url": "http://www.postrank.com"
    },
    {
        "pattern": "turnitinbot",
        "addition_date": "2010/09/26",
        "url": "http://www.turnitin.com"
    },
    {
        "pattern": "scribdbot",
        "addition_date": "2010/09/28",
        "url": "http://www.scribd.com"
    },
    {
        "pattern": "page2rss",
        "addition_date": "2010/10/07",
        "url": "http://www.page2rss.com"
    },
    {
        "pattern": "sitebot",
        "addition_date": "2010/12/15",
        "url": "http://www.sitebot.org"
    },
    {
        "pattern": "linkdex",
        "addition_date": "2011/01/06",
        "url": "http://www.linkdex.com"
    },
    {
        "pattern": "Adidxbot",
        "url": "http://onlinehelp.microsoft.com/en-us/bing/hh204496.aspx"
    },
    {
        "pattern": "blekkobot",
        "url": "http://blekko.com/about/blekkobot"
    },
    {
        "pattern": "ezooms",
        "addition_date": "2011/04/27",
        "url": "http://www.phpbb.com/community/viewtopic.php?f=64&t=935605&start=450#p12948289"
    },
    {
        "pattern": "dotbot",
        "addition_date": "2011/04/27"
    },
    {
        "pattern": "Mail.RU_Bot",
        "addition_date": "2011/04/27",
        "instances" : [
            "Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +http://go.mail.ru/",
            "Mozilla/5.0 (compatible; Mail.RU_Bot/2.0; +http://go.mail.ru/"
        ]
    },
    {
        "pattern": "discobot",
        "addition_date": "2011/05/03",
        "url": "http://discoveryengine.com/discobot.html"
    },
    {
        "pattern": "heritrix",
        "addition_date": "2011/06/21",
        "url": "http://crawler.archive.org/"
    },
    {
        "pattern": "findthatfile",
        "addition_date": "2011/06/21",
        "url": "http://www.findthatfile.com/"
    },
    {
        "pattern": "europarchive.org",
        "addition_date": "2011/06/21",
        "url": ""
    },
    {
        "pattern": "NerdByNature.Bot",
        "addition_date": "2011/07/12",
        "url": "http://www.nerdbynature.net/bot"
    },
    {
        "pattern": "sistrix crawler",
        "addition_date": "2011/08/02"
    },
    {
        "pattern": "ahrefsbot",
        "addition_date": "2011/08/28"
    },
    {
        "pattern": "Aboundex",
        "addition_date": "2011/09/28",
        "url": "http://www.aboundex.com/crawler/"
    },
    {
        "pattern": "domaincrawler",
        "addition_date": "2011/10/21"
    },
    {
        "pattern": "wbsearchbot",
        "addition_date": "2011/12/21",
        "url": "http://www.warebay.com/bot.html"
    },
    {
        "pattern": "summify",
        "addition_date": "2012/01/04",
        "url": "http://summify.com"
    },
    {
        "pattern": "ccbot",
        "addition_date": "2012/02/05",
        "url": "http://www.commoncrawl.org/bot.html"
    },
    {
        "pattern": "edisterbot",
        "addition_date": "2012/02/25"
    },
    {
        "pattern": "seznambot",
        "addition_date": "2012/03/14"
    },
    {
        "pattern": "ec2linkfinder",
        "addition_date": "2012/03/22"
    },
    {
        "pattern": "gslfbot",
        "addition_date": "2012/04/03"
    },
    {
        "pattern": "aihitbot",
        "addition_date": "2012/04/16"
    },
    {
        "pattern": "intelium_bot",
        "addition_date": "2012/05/07"
    },
    {
        "pattern": "facebookexternalhit",
        "addition_date": "2012/05/07"
    },
    {
        "pattern": "yeti",
        "addition_date": "2012/05/07"
    },
    {
        "pattern": "RetrevoPageAnalyzer",
        "addition_date": "2012/05/07"
    },
    {
        "pattern": "lb-spider",
        "addition_date": "2012/05/07"
    },
    {
        "pattern": "sogou",
        "addition_date": "2012/05/13",
        "url": "http://www.sogou.com/docs/help/webmasters.htm#07"
    },
    {
        "pattern": "lssbot",
        "addition_date": "2012/05/15"
    },
    {
        "pattern": "careerbot",
        "addition_date": "2012/05/23",
        "url": "http://www.career-x.de/bot.html"
    },
    {
        "pattern": "wotbox",
        "addition_date": "2012/06/12",
        "url": "http://www.wotbox.com"
    },
    {
        "pattern": "wocbot",
        "addition_date": "2012/07/25",
        "url": "http://www.wocodi.com/crawler"
    },
    {
        "pattern": "ichiro",
        "addition_date": "2012/08/28",
        "url": "http://help.goo.ne.jp/help/article/1142"
    },
    {
        "pattern": "DuckDuckBot",
        "addition_date": "2012/09/19",
        "url": "http://duckduckgo.com/duckduckbot.html"
    },
    {
        "pattern": "lssrocketcrawler",
        "addition_date": "2012/09/24"
    },
    {
        "pattern": "drupact",
        "addition_date": "2012/09/27",
        "url": "http://www.arocom.de/drupact"
    },
    {
        "pattern": "webcompanycrawler",
        "addition_date": "2012/10/03"
    },
    {
        "pattern": "acoonbot",
        "addition_date": "2012/10/07",
        "url": "http://www.acoon.de/robot.asp"
    },
    {
        "pattern": "openindexspider",
        "addition_date": "2012/10/26",
        "url": "http://www.openindex.io/en/webmasters/spider.html"
    },
    {
        "pattern": "gnam gnam spider",
        "addition_date": "2012/10/31"
    },
    {
        "pattern": "web-archive-net.com.bot"
    },
    {
        "pattern": "backlinkcrawler",
        "addition_date": "2013/01/04"
    },
    {
        "pattern": "coccoc",
        "addition_date": "2013/01/04",
        "url": "http://help.coccoc.vn/"
    },
    {
        "pattern": "integromedb",
        "addition_date": "2013/01/10",
        "url": "http://www.integromedb.org/Crawler"
    },
    {
        "pattern": "content crawler spider",
        "addition_date": "2013/01/11"
    },
    {
        "pattern": "toplistbot",
        "addition_date": "2013/02/05"
    },
    {
        "pattern": "seokicks-robot",
        "addition_date": "2013/02/25"
    },
    {
        "pattern": "it2media-domain-crawler",
        "addition_date": "2013/03/12"
    },
    {
        "pattern": "ip-web-crawler.com",
        "addition_date": "2013/03/22"
    },
    {
        "pattern": "siteexplorer.info",
        "addition_date": "2013/05/01"
    },
    {
        "pattern": "elisabot",
        "addition_date": "2013/06/27"
    },
    {
        "pattern": "proximic",
        "addition_date": "2013/09/12",
        "url": "http://www.proximic.com/info/spider.php"
    },
    {
        "pattern": "changedetection",
        "addition_date": "2013/09/13",
        "url": "http://www.changedetection.com/bot.html"
    },
    {
        "pattern": "blexbot",
        "addition_date": "2013/10/03",
        "url": "http://webmeup-crawler.com/"
    },
    {
        "pattern": "arabot",
        "addition_date": "2013/10/09"
    },
    {
        "pattern": "WeSEE:Search",
        "addition_date": "2013/11/18"
    },
    {
        "pattern": "niki-bot",
        "addition_date": "2014/01/01"
    },
    {
        "pattern": "CrystalSemanticsBot",
        "addition_date": "2014/02/17",
        "url": "http://www.crystalsemantics.com/user-agent/"
    },
    {
        "pattern": "rogerbot",
        "addition_date": "2014/02/28",
        "url": "http://moz.com/help/pro/what-is-rogerbot-"
    },
    {
        "pattern": "360Spider",
        "addition_date": "2014/03/14",
        "url": "http://needs-be.blogspot.co.uk/2013/02/how-to-block-spider360.html"
    },
    {
        "pattern": "psbot",
        "addition_date": "2014/03/31",
        "url": "http://www.picsearch.com/bot.html"
    },
    {
        "pattern": "InterfaxScanBot",
        "addition_date": "2014/03/31",
        "url": "http://scan-interfax.ru"
    },
    {
        "pattern": "Lipperhey SEO Service",
        "addition_date": "2014/04/01",
        "url": "http://www.lipperhey.com/"
    },
    {
        "pattern": "CC Metadata Scaper",
        "addition_date": "2014/04/01",
        "url": "http://wiki.creativecommons.org/Metadata_Scraper"
    },
    {
        "pattern": "g00g1e.net",
        "addition_date": "2014/04/01",
        "url": "http://www.g00g1e.net/"
    },
    {
        "pattern": "GrapeshotCrawler",
        "addition_date": "2014/04/01",
        "url": "http://www.grapeshot.co.uk/crawler.php"
    },
    {
        "pattern": "urlappendbot",
        "addition_date": "2014/05/10",
        "url": "http://www.profound.net/urlappendbot.html"
    },
    {
        "pattern": "brainobot",
        "addition_date": "2014/06/24"
    },
    {
        "pattern": "fr-crawler",
        "addition_date": "2014/07/31",
        "instances": ["Mozilla/5.0 (compatible; fr-crawler/1.1)"]
    },
    {
        "pattern": "binlar",
        "addition_date": "2014/09/12",
        "instances": [
            "binlar_2.6.3 binlar2.6.3@unspecified.mail",
            "binlar_2.6.3 binlar_2.6.3@unspecified.mail",
            "binlar_2.6.3 larbin2.6.3@unspecified.mail",
            "binlar_2.6.3 phanendra_kalapala@McAfee.com",
            "binlar_2.6.3 test@mgmt.mic"
        ]
    },
    {
        "pattern": "SimpleCrawler",
        "addition_date": "2014/09/12",
        "instances": ["SimpleCrawler/0.1" ]
    },
    {
        "pattern": "Livelapbot",
        "addition_date": "2014/09/12",
        "instances": ["Livelapbot/0.1" ]
    },
    {
        "pattern": "Twitterbot",
        "addition_date": "2014/09/12",
        "instances": ["Twitterbot/0.1", "Twitterbot/1.0" ]
    },
    {
        "pattern": "cXensebot",
        "addition_date": "2014/10/05",
        "instances": ["cXensebot/1.1a"],
        "url": "http://www.cxense.com/bot.html"
    },
    {
        "pattern": "smtbot",
        "addition_date": "2014/10/04",
        "instances": ["Mozilla/5.0 (compatible; SMTBot/1.0; +http://www.similartech.com/smtbo)t", "SMTBot (similartech.com/smtbot)"],
        "url": "http://www.similartech.com/smtbot"
    },
    {
        "pattern": "bnf.fr_bot",
        "addition_date": "2014/11/18",
        "url": "http://www.bnf.fr/fr/outils/a.dl_web_capture_robot.html",
        "instances": ["Mozilla/5.0 (compatible; bnf.fr_bot; +http://www.bnf.fr/fr/outils/a.dl_web_capture_robot.html)"]
    },
    {
        "pattern": "A6-Indexer",
        "addition_date": "2014/12/05",
        "url": "http://www.a6corp.com/a6-web-scraping-policy/",
        "instances": ["A6-Indexer"]
    },
    {
        "pattern": "ADmantX",
        "addition_date": "2014/12/05",
        "url": "http://www.admantx.com",
        "instances": ["ADmantX Platform Semantic Analyzer - ADmantX Inc. - www.admantx.com - support@admantx.com"]
    },
    {
        "pattern": "Facebot",
        "url": "https://developers.facebook.com/docs/sharing/best-practices#crawl",
        "addition_date": "2014/12/30"
    },
    {
        "pattern": "Twitterbot",
        "url": "https://dev.twitter.com/cards/getting-started",
        "addition_date": "2014/12/30"
    },
    {
        "pattern": "OrangeBot",
        "instances": ["Mozilla/5.0 (compatible; OrangeBot/2.0; support.orangebot@orange.com"],
        "addition_date": "2015/01/12"
    },
    {
        "pattern": "memorybot",
        "url": "http://mignify.com/bot.htm",
        "instances": ["Mozilla/5.0 (compatible; memorybot/1.21.14 +http://mignify.com/bot.html)"],
        "addition_date": "2015/02/01"
    },
    {
        "pattern": "AdvBot",
        "url": "http://advbot.net/bot.html",
        "instances": ["Mozilla/5.0 (compatible; AdvBot/2.0; +http://advbot.net/bot.html)"],
        "addition_date": "2015/02/01"
    },
    {
        "pattern": "MegaIndex",
        "url": "https://www.megaindex.ru/?tab=linkAnalyze",
        "instances": ["Mozilla/5.0 (compatible; MegaIndex.ru/2.0; +https://www.megaindex.ru/?tab=linkAnalyze)"],
        "addition_date": "2015/03/28"
    },
    {
        "pattern": "SemanticScholarBot",
        "url": "http://s2.allenai.org/bot.html",
        "instances": ["SemanticScholarBot/1.0 (+http://s2.allenai.org/bot.html)"],
        "addition_date": "2015/03/28"
    },
    {
        "pattern": "ltx71",
        "url": "http://ltx71.com/",
        "instances": ["ltx71 - (http://ltx71.com/)"],
        "addition_date": "2015/04/04"
    },
    {
        "pattern": "nerdybot",
        "url": "http://nerdybot.com/",
        "instances": ["nerdybot"],
        "addition_date": "2015/04/05"
    },
    {
        "pattern": "xovibot",
        "url": "http://www.xovibot.net/",
        "instances": ["Mozilla/5.0 (compatible; XoviBot/2.0; +http://www.xovibot.net/)"],
        "addition_date": "2015/04/05"
    },
    {
        "pattern": "BUbiNG",
        "url": "http://law.di.unimi.it/BUbiNG.html",
        "instances": ["BUbiNG (+http://law.di.unimi.it/BUbiNG.html)"],
        "addition_date": "2015/04/06"
    },
    {
        "pattern": "Qwantify",
        "url": "https://www.qwant.com/",
        "instances": ["Mozilla/5.0 (compatible; Qwantify/2.0n; +https://www.qwant.com/)/*"],
        "addition_date": "2015/04/06"
    },
    {
        "pattern": "archive.org_bot",
        "url": "http://www.archive.org/details/archive.org_bot",
        "instances": ["Mozilla/5.0 (compatible; archive.org_bot +http://www.archive.org/details/archive.org_bot)"],
        "addition_date": "2015/04/14"
    },
    {
        "pattern": "Applebot",
        "url": "http://www.apple.com/go/applebot",
        "addition_date": "2015/04/15"
    },
    {
        "pattern": "TweetmemeBot",
        "url": "http://datasift.com/bot.html",
        "instances": ["Mozilla/5.0 (TweetmemeBot/4.0; +http://datasift.com/bot.html) Gecko/20100101 Firefox/31.0"],
        "addition_date": "2015/04/15"
    },
    {
        "pattern": "crawler4j",
        "url": "https://github.com/yasserg/crawler4j",
        "instances": ["crawler4j (http://code.google.com/p/crawler4j/)"],
        "addition_date": "2015/05/07"
    },
    {
        "pattern": "findxbot",
        "url": "http://www.findxbot.com",
        "instances": ["Mozilla/5.0 (compatible; Findxbot/1.0; +http://www.findxbot.com)"],
        "addition_date": "2015/05/07"
    },
    {
        "pattern": "SemrushBot",
        "url": "http://www.semrush.com/bot.html",
        "instances": ["Mozilla/5.0 (compatible; SemrushBot/0.98~bl; +http://www.semrush.com/bot.html)"],
        "addition_date": "2015/05/26"
    },
    {
        "pattern": "yoozBot",
        "url": "http://yooz.ir",
        "instances": ["Mozilla/5.0 (compatible; yoozBot-2.2; http://yooz.ir; info@yooz.ir)"],
        "addition_date": "2015/05/26"
    },
    {
        "pattern": "lipperhey",
        "url": "http://www.lipperhey.com/",
        "instances": ["Mozilla/5.0 (compatible; Lipperhey Link Explorer; http://www.lipperhey.com/)", "Mozilla/5.0 (compatible; Lipperhey SEO Service; http://www.lipperhey.com/)", "Mozilla/5.0 (compatible; Lipperhey Site Explorer; http://www.lipperhey.com/)", "Mozilla/5.0 (compatible; Lipperhey-Kaus-Australis/5.0; +https://www.lipperhey.com/en/about/)"],
        "addition_date": "2015/08/26"
    },
    {
        "pattern": "y!j-asr",
        "url": "http://www.yahoo-help.jp/app/answers/detail/p/595/a_id/42716/",
        "instances": ["Y!J-ASR/0.1 crawler (http://www.yahoo-help.jp/app/answers/detail/p/595/a_id/42716/)"],
        "addition_date": "2015/05/26"
    },
    {
        "pattern": "Domain Re-Animator Bot",
        "url": "http://domainreanimator.com",
        "instances": ["Domain Re-Animator Bot (http://domainreanimator.com) - support@domainreanimator.com"],
        "addition_date": "2015/04/14"
    },
    {
        "pattern": "AddThis",
        "url": "https://www.addthis.com",
        "instances": ["AddThis.com robot tech.support@clearspring.com"],
        "addition_date": "2015/06/02"
    },
    {
        "pattern": "Screaming Frog SEO Spider",
        "url": "http://www.screamingfrog.co.uk/seo-spider",
        "instances": ["Screaming Frog SEO Spider/5.1"],
        "addition_date": "2016/01/08"
    },
    {
        "pattern": "MetaURI",
        "url": "http://www.useragentstring.com/MetaURI_id_17683.php",
        "instances": ["MetaURI API/2.0 +metauri.com"],
        "addition_date": "2016/01/02"
    },
    {
        "pattern": "Scrapy",
        "url": "http://scrapy.org/",
        "instances": ["Scrapy/1.0.3 (+http://scrapy.org)"],
        "addition_date": "2016/01/02"
    },
    {
        "pattern": "LivelapBot",
        "url": "http://site.livelap.com/crawler",
        "instances": ["LivelapBot/0.2 (http://site.livelap.com/crawler)"],
        "addition_date": "2016/01/02"
    },
    {
        "pattern": "OpenHoseBot",
        "url": "http://www.openhose.org/bot.html",
        "instances": ["Mozilla/5.0 (compatible; OpenHoseBot/2.1; +http://www.openhose.org/bot.html)"],
        "addition_date": "2016/01/02"
    },
    {
        "pattern": "CapsuleChecker",
        "url": "http://www.capsulink.com/about",
        "instances": ["CapsuleChecker (http://www.capsulink.com/)"],
        "addition_date": "2016/01/02"
    },
    {
        "pattern": "collection@infegy.com",
        "url": "http://infegy.com/",
        "instances": ["Mozilla/5.0 (compatible) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36 collection@infegy.com"],
        "addition_date": "2016/01/03"
    },
    {
        "pattern": "IstellaBot",
        "url": "http://www.tiscali.it/",
        "instances": ["Mozilla/5.0 (compatible; IstellaBot/1.23.15 +http://www.tiscali.it/)"],
        "addition_date": "2016/01/09"
    },
    {
        "pattern": "DeuSu",
        "addition_date": "2016/01/23",
        "url": "https://deusu.de/robot.html"
    },
    {
        "pattern": "betaBot",
        "addition_date": "2016/01/23"
    },
    {
        "pattern": "Cliqzbot",
        "addition_date": "2016/01/23",
        "url": "http://cliqz.com/company/cliqzbot"
    },
    {
        "pattern": "MojeekBot",
        "addition_date": "2016/01/23",
        "url": "https://www.mojeek.com/bot.html"
    },
    {
        "pattern": "netEstate NE Crawler",
        "addition_date": "2016/01/23",
        "url": "+http://www.website-datenbank.de/"
    },
    {
        "pattern": "SafeSearch microdata crawler",
        "addition_date": "2016/01/23",
        "url": "https://safesearch.avira.com"
    },
    {
        "pattern": "Gluten Free Crawler",
        "addition_date": "2016/01/23",
        "url": "http://glutenfreepleasure.com/"
    },
    {
        "pattern": "Sonic",
        "addition_date": "2016/02/08",
        "url": "http://www.yama.info.waseda.ac.jp/~crawler/info.html"
    },
    {
        "pattern": "Sysomos",
        "addition_date": "2016/02/08",
        "url": "http://www.sysomos.com"
    },
    {
        "pattern": "Trove",
        "addition_date": "2016/02/08",
        "url": "http://www.trove.com"
    },
    {
        "pattern": "deadlinkchecker",
        "addition_date": "2016/02/08",
        "url": "http://www.deadlinkchecker.com"
    },
    {
        "pattern": "Slack-ImgProxy",
        "addition_date": "2016/04/25",
        "url": "https://api.slack.com/robots"
    },
    {
        "pattern": "Embedly",
        "addition_date": "2016/04/25",
        "url": "http://support.embed.ly"
    },
    {
        "pattern": "RankActiveLinkBot",
        "addition_date": "2016/06/20",
        "url": "https://rankactive.com/resources/rankactive-linkbot"
    }
];
var markers = [];
var map;
var geocoder = new google.maps.Geocoder();
var refreshInterval;

(function( $ ) {
    'use strict';

    var history_loading = '<tr class="loading_history"><td class="uk-text-center"><i class="fa fa-refresh fa-spin fa-2x"></i> <br> Loading History Data</td></tr>';
    var last_id = 0;

    $(document).ready(function(){
        f.load_MonitorHistory();
        f.more_MonitorHistory();
        f.refresh_MonitorHistory();
        f.load_CrawlerData();
        f.load_FirewallData();
        f.block_by();
        f.block_crawler();
        f.block_ip();
        f.unblock_by();
        f.initMask();
        f.initCountryMap();
        f.searchCrawlers();
        f.highlightIPs();
        f.banAndUnban();
    });

    var f = {
        highlightIPs: function(){
            $(document).on('click', '.visited_IP', function(){
                var ips = $('.visited_IP');
                var value = $(this).text();

                ips.each(function(){
                    if ($(this).text() == value) {
                        $(this).addClass('marked');
                    } else {
                        $(this).removeClass('marked');
                    }
                });

            });
        },
        searchCrawlers: function(){
            $('.uk-search').submit(function(e){e.preventDefault();
                var value = $('#search-crawlers').val().toLowerCase();
                $('.crawler.rendered').each(function() {
                    var pattern = $(this).data('id').toLowerCase();
                    if (value == '') {
                        $(this).parent().fadeIn();
                    } else {
                        if (pattern.indexOf(value)) {
                            $(this).parent().fadeOut();
                        } else {
                            $(this).parent().fadeIn();
                        }
                    }
                });
            });
        },
        removeMapMarker: function(name){
            var new_markers = [];
            for(var i = 0; i < markers.length; i++) {
                var m = markers[i];
                if (m.name == name) {
                    m.marker.setMap(null);
                } else {
                    new_markers.push(m);
                }
            }
            markers = new_markers;
        },
        addMapMarker: function(name, lat, long){
            var myLatLng = new google.maps.LatLng(lat, long);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                animation: google.maps.Animation.DROP
            });
            markers.push({
                name: name,
                marker: marker
            });
        },
        initCountryMap: function () {
            // Create Map
            var myLatlng = new google.maps.LatLng(46.855141, -96.8372664);
            var map_canvas = document.getElementById('country-map');
            var map_options = {
                center: myLatlng,
                zoom: 2,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true
            };
            map = new google.maps.Map(map_canvas, map_options);

            google.maps.event.addListener(map, 'click', function (event) {
                var setting = {"location": event.latLng};
                geocoder.geocode(setting, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            // Parse address
                            var addressParts = results[0].address_components;
                            for (var i = 0; i < addressParts.length; i++) {
                                var ad = addressParts[i];
                                if (ad.types[0] == "country") {
                                    var country = ad.long_name;
                                    // Put this country into display
                                    $('.selected-country').val(country);
                                    $('.selected_country_button').data('id', country);
                                    break;
                                }
                            }
                        }
                    }
                });
            });

            // Fix the map
            $('.map-container').on('click', function () {
                setTimeout(function () {
                    var center = map.getCenter();
                    google.maps.event.trigger(map, 'resize');
                    map.setCenter(center);
                }, 400);
            });

            setTimeout(function () {
                // Populate Map with banned Countries
                $('.banned_country').each(function () {
                    var name = $(this).text();
                    for (var i = 0; i < countries.length; i++) {
                        var country = countries[i];
                        if (country.name == name) {
                            f.addMapMarker(name, country.lat, country.lon);
                            break;
                        }
                    }
                });

            }, 1000);
        },
        initMask: function(){
            $('.uk-ip-address').each(function(){
                $(this).mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                    translation: {
                        'Z': {
                            pattern: /[0-9]/, optional: true
                        }
                    }
                });
            });
            $('.uk-ip-address-subnet').each(function(){
                $(this).mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                    translation: {
                        'Z': {
                            pattern: /[0-9]/, optional: true
                        }
                    }
                });
            });
        },
        examine_Location: function(element, url) {
            var badWords = [
                'wp-config',
                'security.php',
                'configbak.php',
                '/plugins/',
                'install',
                'setup',
                'download',
                'privacy.php'
            ];
            element.attr("href", url).html(url);

            // Check if URL is potentially dangerous
            if (new RegExp(badWords.join("|")).test(url)) {
                element.html(element.html() + ' <i class="fa fa-warning"></i>');
                element.addClass('dangerous-url');
                element.attr('title', 'This url is potentially dangerous. You may want to block the IP making this request if similar occur.');
            }
        },
        refresh_MonitorHistory: function() {
            refreshInterval = setInterval(function(){
                var data = {
                    action: 'wpc_firewall_monitor_load_history',
                    id: $('#lastID').val()
                };
                $.post(wpc_data.wp_post, data, function(d){
                    var history_results = d.data;
                    if(history_results.length < 1){
                        return false;
                    }else{

                        var template_data = [];

                        for(var i = 0; i < history_results.length; i++){

                            var row = history_results[i];
                            var template = $('.geo_monitor_template').clone();

                            // Set the lastID
                            if (i == 0) {
                                $('#lastID').val(row.id);
                            }

                            template.removeClass('uk-hidden');
                            template.removeClass('geo_monitor_template');
                            template.addClass('uk-width-large-1-2');
                            template.addClass('m-b-10');
                            template.addClass('animated');
                            template.addClass('bounce');

                            var location_code = 'us';
                            if (row.location_code != '') {
                                location_code = row.location_code;
                            }

                            template.find('.country_Flag').attr("src", Plugin_URL + "/assets/img/flags/" + location_code + ".png");
                            template.find('.country_Location').attr("href", "https://www.google.com/maps?q=" + row.location).html(row.location);
                            f.examine_Location(template.find('.visited_Location'), Home_URL + row.path);

                            template.find('.visited_DateTime').html(row.date_visited);
                            template.find('.visited_IP').html(row.ip);
                            template.find('.visited_Hostname').html(row.hostname);

                            if (row.referrer !== 'Direct') {
                                template.find('.referrer').html('<a href="'+row.referrer+'" target="_blank">'+row.referrer+'</a>');
                            }

                            if (row.not_found == 1) {
                                template.find('.visited').html('visited invalid page').addClass('invalid_page').attr('title', 'This means that this IP tried to visit the page that does not exist within your WordPress. Could be potentially dangerous or a dead backlink.');
                            }

                            template.find('.visited_Hostname').html(row.hostname);

                            template.find('.browser_Agent').html(row.browser_agent);

                            template.find('.browser_Name').html(row.browser_name);
                            template.find('.browser_Version').html(row.browser_ver);

                            template.find('[data-type="ip"]').attr( "data-id", row.ip );
                            template.find('[data-type="location"]').attr( "data-id", row.location );

                            template_data.push(template);
                        }

                        $('#geo_monitor_table').prepend(template_data);

                    }

                });
            }, 6000);
        },
        load_MonitorHistory : function (offset) {
            $('.load_more').html('<i class="fa fa-refresh fa-spin"></i> Loading More');

            var data = {};
            if(typeof (offset) != null){
                data = {
                    action: 'wpc_firewall_monitor_load_history',
                    offset: offset
                };
            }else{
                $('#monitor_history_body').html(history_loading);
                last_id = 0;
                data = {
                    action: 'wpc_firewall_monitor_load_history'
                };
            }

            $.post(wpc_data.wp_post, data, function(d){
                var history_results = d.data;
                var load_more_button = false;
                $('.more_MonitorHistory').parent().remove();
                $('.more_data').remove();
                $('.loading_history').remove();

                if(history_results.length < 1){
                    $('#geo_monitor_table').html('<div class="uk-text-center">Please wait a few moments until we start receiving some data...</div>');
                }else{

                    var template_data = [];

                    for(var i = 0; i < history_results.length; i++){

                        var row = history_results[i];
                        var template = $('.geo_monitor_template').clone();

                        // Set the lastID
                        if (i == 0 && typeof offset == 'undefined') {
                            $('#lastID').val(row.id);
                        }

                        template.removeClass('uk-hidden');
                        template.removeClass('geo_monitor_template');
                        template.addClass('uk-width-large-1-2');
                        template.addClass('m-b-10');

                        var location_code = 'us';
                        if (row.location_code != '') {
                            location_code = row.location_code;
                        }

                        template.find('.country_Flag').attr("src", Plugin_URL + "/assets/img/flags/" + location_code + ".png");
                        template.find('.country_Location').attr("href", "https://www.google.com/maps?q=" + row.location).html(row.location);
                        f.examine_Location(template.find('.visited_Location'), Home_URL + row.path);

                        template.find('.visited_DateTime').html(row.date_visited);
                        template.find('.visited_IP').html(row.ip);
                        template.find('.visited_Hostname').html(row.hostname);

                        if (row.referrer !== 'Direct') {
                            template.find('.referrer').html('<a href="'+row.referrer+'" target="_blank">'+row.referrer+'</a>');
                        }

                        if (row.not_found == 1) {
                            template.find('.visited').html('visited invalid page').addClass('invalid_page').attr('title', 'This means that this IP tried to visit the page that does not exist within your WordPress. Could be potentially dangerous or a dead backlink.');
                        }

                        template.find('.visited_Hostname').html(row.hostname);

                        template.find('.browser_Agent').html(row.browser_agent);

                        template.find('.browser_Name').html(row.browser_name);
                        template.find('.browser_Version').html(row.browser_ver);

                        template.find('[data-type="ip"]').attr( "data-id", row.ip );
                        template.find('[data-type="location"]').attr( "data-id", row.location );

                        template_data.push(template);
                    }

                    if(history_results.length <= 50){
                        load_more_button = true;
                        last_id += history_results.length;
                    }else{
                        load_more_button = false;
                    }

                    $('#geo_monitor_table').append(template_data);

                    if(load_more_button){
                        $('#geo_monitor_table').append('<div class="uk-text-center"><button class="uk-button uk-button-primary more_MonitorHistory" data-offset="'+last_id+'" type="button"><i class="fa fa-arrow-circle-down"></i> Load More History</button></div>');
                    }
                }

            });
        },
        more_MonitorHistory: function () {
            $(document).on('click', '.more_MonitorHistory', function(){
                f.load_MonitorHistory($(this).data('offset'));
            })
        },
        load_CrawlerData: function(){
            for(var i = 0; i < crawlers.length; i++) {
                var crawler  = crawlers[i];
                var template = $('.crawler.template').clone();
                var holder   = $('<div class="uk-width-medium-1-4"></div>');

                template.removeClass('template');
                template.removeClass('uk-hidden');
                template.addClass('rendered');

                template.attr('data-id', crawler.pattern);

                template.find('.crawler-name').html(crawler.pattern);

                if (crawler.hasOwnProperty('url')) {
                    template.find('.crawler-info').html(
                        '<a href="'+crawler.url+'" target="_blank">'+crawler.url+'</a>'
                    );
                } else {
                    template.find('.crawler-info').html(
                        'N\\A'
                    );
                }

                holder.append(template);
                $('.crawler-list').append(holder);
            }
        },
        load_FirewallData: function () {
            var data = {
                action: 'wpc_firewall_load_data'
            };

            $.post(wpc_data.wp_post, data, function(d){

                var data_ip = "";
                var data_location = "";

                $.each( d.data.ip, function( key, value ) {
                    data_ip += '<tr>' +
                        '<td>' + key + '</td>' +
                        '<td>' + wpc_global.prettyDate(value.date) + '</td>' +
                        '<td><button class="uk-button uk-button-danger uk-button-mini firewall_unban" data-type="ip" data-id="'+key+'" type="button">Unban</button></td>' +
                        '</tr>'
                });
                if (data_ip == '') {
                    data_ip = '<tr><td colspan="3">No data in this table.</td></tr>';
                }
                $('#firewall_banned_ip').html(data_ip);

                $.each( d.data.location, function( key, value ) {
                    data_location += '<tr>' +
                        '<td class="banned_country">' + key + '</td>' +
                        '<td>' + wpc_global.prettyDate(value.date) + '</td>' +
                        '<td><button class="uk-button uk-button-danger uk-button-mini firewall_unban" data-type="location" data-id="'+key+'" type="button">Unban</button></td>' +
                        '</tr>'
                });
                if (data_location == '') {
                    data_location = '<tr><td colspan="3">No data in this table.</td></tr>';
                }
                $('#firewall_banned_location').html(data_location);

                $.each( d.data.crawler, function( key, value ) {
                    $('.crawler.rendered').each(function(){
                        var pattern = $(this).data('id');
                        if (key == pattern) {
                            $(this).addClass('banned');
                            $(this).attr('title', 'This crawler is banned from visiting your website. Click this box to unban it.');
                            $(this).find('.crawler-status').addClass('banned').removeClass('allowed').addClass('fa-close').removeClass('fa-check');
                        }
                    });
                });

            })
        },
        block_by: function () {
            $(document).on('click', '.firewall_ban', function (e) {
                e.preventDefault();

                var data = {
                    action: 'wpc_firewall_block_by',
                    id: $(this).data('id'),
                    type: $(this).data('type')
                };

                if (data.type == 'location') {
                    for (var i = 0; i < countries.length; i++) {
                        var country = countries[i];
                        if (country.name == data.id) {
                            f.addMapMarker(data.id, country.lat, country.lon);
                            break;
                        }
                    }
                }

                $.post(wpc_data.wp_post, data, function(d){
                    UIkit.notify("<i class='uk-icon-check'></i> " + d.message, {pos:'bottom-right', status:d.status});
                    f.load_FirewallData();
                })
            })
        },
        block_crawler: function () {
            $(document).on('click', '.crawler.rendered', function (e) {
                e.preventDefault();

                var crawlerBox = this;

                var data = {
                    action: 'wpc_firewall_block_by',
                    id: $(crawlerBox).data('id'),
                    name: $(crawlerBox).data('id'),
                    type: 'crawler'
                };

                if ($(crawlerBox).hasClass('banned')) {
                    data.action = 'wpc_firewall_unblock_by';
                }

                $.post(wpc_data.wp_post, data, function(d){
                    if (!$(crawlerBox).hasClass('banned')) {
                        $(crawlerBox).addClass('banned');
                        $(crawlerBox).attr('title', 'This crawler is banned from visiting your website. Click this box to unban it.');
                        $(crawlerBox).find('.crawler-status').addClass('banned').removeClass('allowed').addClass('fa-close').removeClass('fa-check');
                    } else {
                        $(crawlerBox).removeClass('banned');
                        $(crawlerBox).attr('title', 'This crawler is allowed to visit your website. Click this box to ban it.');
                        $(crawlerBox).find('.crawler-status').addClass('allowed').removeClass('banned').addClass('fa-check').removeClass('fa-close');
                    }
                })
            })
        },
        block_ip: function(){
            $(document).on('submit', '.ban-ip', function(e){
                e.preventDefault();

                var id;
                var form = this;
                var dataArray = $(form).serializeArray();
                if (dataArray[0].value != '') {
                    id = dataArray[0].value;
                } else if (dataArray[1].value != '' && dataArray[2].value != '') {
                    id = dataArray[1].value + ' - ' + dataArray[2].value;
                }

                var data = {
                    action: 'wpc_firewall_block_by',
                    type: "ip",
                    id: id
                };

                $.post(wpc_data.wp_post, data, function(d){
                    UIkit.notify("<i class='uk-icon-check'></i> " + d.message, {pos:'bottom-right', status:d.status});
                    f.load_FirewallData();
                    $(form)[0].reset();
                })
            });
        },
        unblock_by: function () {
            $(document).on('click', '.firewall_unban', function (e) {
                e.preventDefault();

                var data = {
                    action: 'wpc_firewall_unblock_by',
                    id: $(this).data('id'),
                    type: $(this).data('type')
                };

                if (data.type == 'location') {
                    f.removeMapMarker($(this).data('id'));
                }

                $.post(wpc_data.wp_post, data, function(d){
                    UIkit.notify("<i class='uk-icon-check'></i> " + d.message, {pos:'bottom-right', status:d.status});
                    f.load_FirewallData();
                })
            })
        },
        banAndUnban: function () {
            $(document).on('click', '.ban_all_crw', function(e) {
                e.preventDefault();

                var crawlers_ajax = {};
                var all_crawlers = [];

                for(var i = 0; i < crawlers.length; i++) {
                    var crawler  = crawlers[i];
                    all_crawlers.push(crawler.pattern);
                }

                crawlers_ajax.action = 'wpc_firewall_block_unblock_crawler';
                crawlers_ajax.type = 'crawler';
                crawlers_ajax.option = 'block';
                crawlers_ajax.ids = all_crawlers.join("|");

                $.post(wpc_data.wp_post, crawlers_ajax, function(d){
                    $('.crawler.rendered').removeClass('banned').addClass('banned');
                    $('.crawler.rendered').attr('title', 'This crawler is banned from visiting your website. Click this box to unban it.');
                    $('.crawler.rendered').find('.crawler-status').addClass('banned').removeClass('allowed').addClass('fa-close').removeClass('fa-check');
                })
            });

            $(document).on('click', '.unban_all_crw', function(e) {
                e.preventDefault();

                var crawlers_ajax = {};
                crawlers_ajax.action = 'wpc_firewall_block_unblock_crawler';
                crawlers_ajax.type = 'crawler';
                crawlers_ajax.option = 'unblock';

                $.post(wpc_data.wp_post, crawlers_ajax, function(d){
                    $('.crawler.rendered').removeClass('banned');
                    $('.crawler.rendered').attr('title', 'This crawler is allowed to visit your website. Click this box to ban it.');
                    $('.crawler.rendered').find('.crawler-status').addClass('allowed').removeClass('banned').addClass('fa-check').removeClass('fa-close');
                })
            });
        }
    }


})( jQuery );
