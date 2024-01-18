<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class NameappController extends Controller
{

    public function index()
    {
        return view('partials.nameapp.inicio');
    }
    public function login()
    {
        return view('partials.nameapp.login');
    }
    public function registro()
    {
        return view('partials.nameapp.registro');
    }

    public function loginPost(Request $request)
    {
        try {
            $credenciales = [
                'familia' => $request->input('familia'),
                'password' => $request->input('password')
            ];
            if (Auth::attempt(['familia' => $credenciales['familia'], 'password' => $credenciales['password']])) {
                session(['usuario' => $request->input('usuario'), 'user_id' => Auth::user()->id]);

                return redirect('/nameapp/juego');
            } else {
                return redirect('/nameapp/login')
                    ->with([
                        'mensajeError' => true, 'mensaje' => 'Contraseña incorrecta.',
                        'css' => 'danger'
                    ]);
            }
        } catch (\Throwable $th) {
            return redirect('/nameapp/login')
                ->with([
                    'mensajeError' => true, 'mensaje' => 'No existe el usuario.',
                    'css' => 'danger'
                ]);
        }
    }

    public function juego()
    {
        return view('partials.nameapp.juego');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registroPost(Request $request)
    {
        try {
            $cuenta = '';
            $cantidad = 0;
            if ($request->sexo == 'mujer') {
                $cantidad = 4743;
                $cuenta = ["Abbie", "Abby", "Abeni", "Abi", "Abia", "Abigail", "Abijail", "Abira", "Abra", "Abril", "Abryl", "Acabi", "Acacia", "Acantha", "Acañir", "Acaropita", "Accalia", "Acira", "Acnin", "Ada", "Adabella", "Adah", "Adalgisa", "Adalia", "Adalis", "Adamina", "Adaobi", "Adara", "Addie", "Addis", "Adela", "Adelaida", "Adelaide", "Adelburga", "Adele", "Adelfa", "Adelia", "Adelina", "Adeline", "Adelle", "Adelma", "Ademia", "Adena", "Adhelma", "Adila", "Adina", "Adita", "Aditi", "Adiva", "Adolfina", "Adoncia", "Adonia", "Adora", "Adoracion", "Adorinda", "Adria", "Adriana", "Adrienne", "Adrine", "Ady", "Affrica", "Afif", "Afra", "Afric", "Africa", "Afrika", "Afrodita", "Agape", "Agar", "Agata", "Agate", "Agatha", "Agatoclia", "Agatonica", "Aggie", "Aghavni", "Aglae", "Agnes", "Agnese", "Agnetha", "Agostina", "Agripina", "Aguaclara", "Agueda", "Agustina", "Ahava", "Aiad", "Aiako", "Aiala", "Aicha", "Aida", "Aide", "Aielet", "Aien", "Aike", "Aiken", "Aiko", "Aila", "Aileen", "Ailen", "Ailin", "Ailish", "Ailla", "Ailsa", "Aimara", "Aime", "Aimee", "Aimi", "Aimie", "Ain", "Aina", "Ainao", "Ainara", "Aine", "Ainhoa", "Ainsley", "Airlia", "Aischa", "Aisha", "Aisling", "Aislinn", "Aissatou", "Aitana", "Aitiana", "Aixa", "Aiyana", "Akane", "Akanke", "Akasma", "Akela", "Akemi", "Akiko", "Akilah", "Akilina", "Akina", "Alaa", "Alahi", "Alaia", "Alaide", "Alala", "Alana", "Alani", "Alanis", "Alanna", "Alaqua", "Alaura", "Alavda", "Alaya", "Alayde", "Alba", "Albana", "Alberta", "Albertina", "Albida", "Albina", "Albinka", "Alcia", "Alcina", "Alcira", "Alcmena", "Alcott", "Alda", "Aldabel", "Aldabella", "Aldana", "Aldara", "Aldea", "Aldegunda", "Aldercy", "Aldina", "Ale", "Alea", "Aleeza", "Alegra", "Alegre", "Alegria", "Aleida", "Alejandra", "Alejandrina", "Aleka", "Aleksandra", "Aleli", "Alelia", "Alen", "Alena", "Alenka", "Alesandra", "Alesia", "Alessandra", "Alessia", "Aleta", "Alethea", "Alethia", "Aletta", "Alexa", "Alexandra", "Alexandria", "Alexandrina", "Alexia", "Alexina", "Aley", "Aleya", "Alfonsa", "Alfonsina", "Alheli", "Alhueche", "Alia", "Alian", "Alice", "Alicia", "Alida", "Alide", "Alidia", "Alihuen", "Alike", "Aliki", "Alima", "Alin", "Alina", "Alinda", "Aline", "Alira", "Alis", "Alison", "Alissa", "Alit", "Alita", "Alithia", "Alix", "Aliza", "Alize", "Allegra", "Allison", "Alma", "Almendra", "Almudena", "Alodia", "Alodie", "Alomai", "Alona", "Alondra", "Aloysia", "Alsacia", "Altagracia", "Altair", "Altea", "Althea", "Aluen", "Aluhe", "Alulay", "Alumine", "Alun", "Aluné", "Aluney", "Alva", "Alvia", "Alvita", "Alys", "Alysa", "Alyson", "Alyssa", "Alzena", "Amabel", "Amable", "Amada", "Amaia", "Amaicha", "Amaike", "Amal", "Amali", "Amalia", "Amaltea", "Amambay", "Amana", "Amancai", "Amancay", "Amanda", "Amandine", "Amani", "Amankaya", "Amantze", "Amara", "Amarande", "Amaranta", "Amarante", "Amarilis", "Amarire", "Amaris", "Amaru", "Amaryllis", "Amata", "Amatista", "Amaury", "Amauta", "Amaya", "Ambar", "Ambay", "Amber", "Ambika", "Ambrosia", "Ameerah", "Amelberga", "Amelia", "Amelida", "Amelie", "Amelin", "Amelina", "Amena", "America", "Amethyst", "Ami", "Amijay", "Amina", "Aminda", "Amine", "Aminta", "Amira", "Amissa", "Amitai", "Amity", "Ammi", "Ammia", "Ammonaria", "Amnedis", "Amneris", "Amor", "Amorina", "Amory", "Amparo", "Amy", "Amye", "An", "Ana", "Ana de las Ermitas", "Anaba", "Anabel", "Anabela", "Anabeli", "Anabella", "Anacarla", "Anacelis", "Anaclara", "Anadina", "Anael", "Anaelle", "Anahi", "Anahiancy", "Anahid", "Anais", "Analaura", "Analena", "Anali", "Analia", "Analis", "Analisa", "Analiz", "Analua", "Analuz", "Analy", "Anamilla", "Anamlor", "Ananda", "Anandi", "Ananquel", "Anarda", "Anasol", "Anastacia", "Anastasia", "Anastay", "Anat", "Anatiel", "Anatilde", "Anatolia", "Anatonia", "Ancelin", "Andi", "Andina", "Andra", "Andras", "Andrea", "Andreana", "Andreina", "Andretta", "Andriela", "Andromaca", "Andromeda", "Andura", "Aneider", "Anelei", "Anelen", "Anelida", "Anelina", "Anelisa", "Anelise", "Anella", "Anemone", "Anera", "Anette", "Anezka", "Angela", "Angeles", "Angelia", "Angelica", "Angelina", "Angeline", "Angelines", "Angelique", "Angeni", "Angie", "Angiolina", "Angustias", "Anhelen", "Ani", "Ania", "Aniana", "Anica", "Aniela", "Aniella", "Aniko", "Anil", "Anina", "Anine", "Aniria", "Anisa", "Anise", "Anisi", "Anisia", "Anita", "Anixe", "Anju", "Anke", "Ankine", "Ann", "Anna", "Annabel", "Annabella", "Annaly", "Anne", "Annelie", "Anneliese", "Annella", "Anneris", "Annette", "Anni", "Annick", "Annie", "Annika", "Annis", "Annoha", "Annora", "Anoel", "Anoha", "Anouk", "Ansley", "Antara", "Anteia", "Anthea", "Anti", "Antia", "Antigona", "Antinisca", "Antje", "Antolina", "Antonela", "Antonella", "Antonia", "Antonieta", "Antonina", "Antu", "Antusa", "Anuk", "Anunciacion", "Anunciada", "Anush", "Any", "Anya", "Anyel", "Anyelen", "Añes", "Añi Nala", "Aoife", "Aolani", "Aoniken", "Apia", "Apirka", "Apolinaria", "Apolline", "Apolonia", "Aponi", "April", "Aquene", "Aquilesia", "Aquilina", "Ara", "Arabela", "Araceli", "Aracelis", "Aracelli", "Araci", "Aracoeli", "Aracy", "Arai", "Araksi", "Arami", "Aramil", "Araminta", "Arandu", "Arantxa", "Arantza", "Arantzazu", "Aranzazu", "Arapey", "Araucaria", "Araxi", "Arcadia", "Arcana", "Arcangela", "Arcelia", "Ardelia", "Ardis", "Are", "Arel", "Areli", "Areliz", "Arella", "Arena", "Aretha", "Aretina", "Aretusa", "Arev", "Arge", "Argelia", "Argen", "Argentina", "Argyroula", "Aria", "Ariadna", "Ariadne", "Ariana", "Ariane", "Arianna", "Arianne", "Aricel", "Aricelli", "Aricia", "Ariela", "Ariella", "Ariene", "Arista", "Arjuna", "Arlene", "Arlinet", "Armanda", "Armandina", "Armenia", "Armentaria", "Armenuhi", "Armida", "Arminda", "Armonia", "Arneris", "Artemisa", "Aruanda", "Aruna", "Aruni", "Aryana", "Arydea", "Ascension", "Ascla", "Asela", "Asha", "Ashera", "Ashlan", "Ashley", "Ashling", "Asia", "Asmara", "Aspasia", "Asta", "Astalora", "Astera", "Asteria", "Astra", "Astrea", "Astrid", "Asuncion", "Atalia", "Atanasia", "Atara", "Atenas", "Atenea", "Athalia", "Athena", "Athenas", "Athina", "Atica", "Atifa", "Atzin", "Auberta", "Aucan", "Auda", "Aude", "Audelina", "Audi", "Audra", "Audrey", "Audry", "Augusta", "Augustine", "Auki", "Aure", "Aurea", "Auree", "Aurek", "Aurelia", "Auri", "Auria", "Aurilia", "Aurora", "Austreberta", "Autana", "Autumm", "Auxtina", "Ava", "Avena", "Avi", "Avital", "Aviva", "Avril", "Aya", "Ayalen", "Ayame", "Ayelen", "Ayelet", "Ayen", "Ayerai", "Ayesa", "Ayesha", "Ayhesa", "Ayiana", "Ayisha", "Ayita", "Ayla", "Aylen", "Aylin", "Aymara", "Aymee", "Ayoka", "Ayrampu", "Ayren", "Ayumi", "Ayun", "Azalea", "Azalia", "Azucena", "Azul", "Babet", "Babette", "Bachar", "Badda", "Badiha", "Badra", "Bahia", "Bahiana", "Baka", "Balbiana", "Balbina", "Baliwani", "Ballard", "Barbara", "Barbea", "Barcli", "Basa", "Basha", "Basia", "Basila", "Basilisa", "Basimah", "Bassa", "Bastiana", "Batana", "Batia", "Batilde", "Batsheva", "Batul", "Batya", "Bay", "Bayo", "Beata", "Beatrice", "Beatrix", "Beatriz", "Beatriz del Valle", "Beattie", "Becca", "Bedelia", "Begga", "Begonia", "Begoña", "Bejle", "Bel", "Bela", "Belana", "Belara", "Belen", "Belena", "Belia", "Belinda", "Belisa", "Belkis", "Belkyss", "Bell", "Bella", "Bellanca", "Belle", "Belona", "Belsy", "Ben Hur", "Bena", "Benedetta", "Benilda", "Benilde", "Benildes", "Benita", "Benjasmin", "Bente", "Beraja", "Berenice", "Berit", "Berjuhi", "Berna", "Bernabela", "Bernadette", "Bernadine", "Bernarda", "Bernardita", "Bernice", "Berta", "Bertha", "Bertila", "Bertilda", "Bertina", "Beryl", "Bes", "Bess", "Beta", "Betania", "Beth", "Bethany", "Bethsabe", "Betiana", "Betina", "Betsabe", "Betsy", "Bette", "Bettina", "Betty", "Beulah", "Beverly", "Bevin", "Bhoomika", "Bian", "Bianca", "Bibiana", "Biblis", "Bice", "Bidelia", "Bigay", "Bilma", "Bina", "Binny", "Birget", "Birgitta", "Birkita", "Bithron", "Bitia", "Blair", "Blake", "Blanca", "Blanche", "Blanda", "Blasina", "Blayne", "Blenda", "Blima", "Bliss", "Blithe", "Blossom", "Bluma", "Blythe", "Bo", "Bohdana", "Bolonia", "Bona", "Bonita", "Bonnie", "Bonosa", "Bracha", "Braina", "Braja", "Brandina", "Brandy", "Brasilina", "Brazil", "Bree", "Breena", "Brenda", "Brenna", "Bretta", "Briana", "Briand", "Brianda", "Brianna", "Briar", "Bridget", "Brie", "Brielle", "Brietta", "Brigida", "Brigit", "Brigitte", "Brilane", "Brina", "Brinley", "Briony", "Brisa", "Briseida", "Brit", "Brita", "Britain", "Britannia", "Britany", "Brites", "Britta", "Brittany", "Broje", "Brooke", "Bruna", "Brunela", "Brunella", "Brunequilda", "Brunette", "Brunilda", "Bruria", "Bryanna", "Brynn", "Burgundofara", "C?yen", "Cadence", "Cadenet", "Caetana", "Cai", "Cailin", "Caimile", "Caitlin", "Caitlyn", "Caitrin", "Cala", "Calamanda", "Calandia", "Calandra", "Calanit", "Calantha", "Caledonia", "Calen", "Calfu", "Calinica", "Caliope", "Calista", "Calixta", "Callia", "Callidora", "Calliope", "Caltha", "Calypso", "Cam", "Camelai", "Camelia", "Cameron", "Camil", "Camila", "Camila de la Caridad", "Camilena", "Camilla", "Camille", "Camillia", "Canace", "Cancianila", "Candace", "Candela", "Candelaria", "Candi", "Candice", "Candida", "Candide", "Candiss", "Candra", "Candy", "Canela", "Cantalicia", "Capitolina", "Capri", "Capucine", "Careli", "Caren", "Carendina", "Caresse", "Carezza", "Caridad", "Carim", "Carimi", "Carina", "Carine", "Caris", "Carisa", "Carissa", "Caritina", "Carla", "Carlen", "Carlene", "Carlin", "Carlina", "Carlota", "Carlotta", "Carly", "Carmel", "Carmela", "Carmelita", "Carmen", "Carmilla", "Carmin", "Carmina", "Carmine", "Carmiña", "Carmit", "Carnelian", "Carol", "Carola", "Carolina", "Caroline", "Caroll", "Carolyn", "Caron", "Carrie", "Cary", "Caryl", "Carysa", "Casandra", "Casdoa", "Casey", "Casia", "Casiana", "Casilda", "Cassandra", "Cassia", "Cassiel", "Castalia", "Castora", "Catalin", "Catalina", "Catarina", "Caterina", "Caterine", "Catherina", "Catherine", "Cathy", "Catrina", "Catriona", "Catterina", "Cay Co", "Cebeles", "Cecile", "Cecilia", "Cecily", "Ceila", "Celandine", "Celanie", "Celedonia", "Celena", "Celene", "Celerina", "Celeste", "Celestina", "Celestine", "Celia", "Celiana", "Celica", "Celide", "Celidonia", "Celina", "Celinda", "Celine", "Celmira", "Celsa", "Celvia", "Cenobia", "Centola", "Cerelia", "Ceres", "Cerise", "Cesarea", "Cesia", "Cesira", "Cetmilena", "Chabela", "Chabley", "Chablis", "Chalice", "Chanah", "Chanda", "Chandi", "Chandra", "Chanel", "Channing", "Chantal", "Charanpreet", "Charis", "Charise", "Charissa", "Charity", "Charlene", "Charlie", "Charlot", "Charlotte", "Charmaine", "Charmian", "Charo", "Chaska", "Chastity", "Chava", "Chavi", "Chaya", "Chelsea", "Chenoa", "Cher", "Cheri", "Cherise", "Cherry", "Cheryl", "Chesna", "Cheyenne", "Chiara", "Chidinma", "Chika", "Chilali", "Chloe", "Chloris", "Chris", "Christa", "Christabel", "Christina", "Christine", "Christy", "Chumani", "Ciara", "Cibele", "Cibeles", "Cielo", "Cilinia", "Cindy", "Cinicia", "Cinthia", "Cintia", "Cinzia", "Cira", "Circe", "Cirenia", "Ciria", "Ciriaca", "Cirila", "Cirinea", "Claire", "Clara", "Clare", "Claribel", "Clarisa", "Clarita", "Claudia", "Claudina", "Claudine", "Cleantha", "Clelia", "Clemencia", "Clementina", "Clementine", "Cleo", "Cleofe", "Cleopatra", "Cleria", "Cliantha", "Clidia", "Clio", "Clitemestra", "Clitemnestra", "Clivia", "Cloe", "Clorinda", "Cloris", "Clotilde", "Clover", "Clyde", "Cochi", "Cody", "Cointa", "Coleta", "Colette", "Colleen", "Coloma", "Columba", "Columbia", "Comfort", "Concepcion", "Concesa", "Concordia", "Connie", "Consorcia", "Constance", "Constancia", "Constanza", "Consuelo", "Coquena", "Cora", "Coral", "Coralia", "Coralie", "Cordelia", "Cordula", "Cori", "Corin", "Corina", "Corinna", "Corinne", "Corliss", "Cornelia", "Cosima", "Cosma", "Costanza", "Coty", "Courtney", "Covadonga", "Craig", "Crescencia", "Crescenciana", "Crescent", "Cressida", "Crispina", "Cristal", "Cristel", "Cristela", "Cristelle", "Cristeta", "Cristhall", "Cristiana", "Cristina", "Cruz", "Crystal", "Cumelen", "Cunegunda", "Cuyen", "Cybele", "Cybill", "Cyd", "Cynara", "Cyndi", "Cynthia", "Cyntia", "Cyrene", "Cyrilla", "Cytheria", "Dabria", "Dacey", "Dacil", "Dafna", "Dafne", "Dafrosa", "Dagma", "Dagmar", "Dagny", "Dahlia", "Dai", "Daiana", "Daiara", "Daila", "Daimi", "Daina", "Daira", "Daisy", "Dakia", "Dakota", "Dalal", "Dale", "Dalia", "Dalila", "Dalina", "Dalinda", "Dallas", "Dalma", "Dalmira", "Damara", "Damaris", "Damasia", "Damiana", "Dana", "Danae", "Danah", "Danesa", "Danett", "Dani", "Dania", "Danica", "Daniela", "Danielle", "Danila", "Danisa", "Danit", "Danitza", "Danna", "Dantzel", "Danya", "Daphne", "Dara", "Darcy", "Daria", "Darla", "Darlene", "Daryl", "Dasha", "Dativa", "Davan", "Davida", "Davina", "Davine", "Dawn", "Daya", "De Aranzazu", "De Fatima", "De la Cruz", "De la Esperanza", "De la Flor", "De la Merced", "De la Paz", "De las Mercedes", "De las Nieves", "De los Angeles", "De los Milagros", "De Lourdes", "De Lujan", "Deandra", "Debbie", "Debora", "Deborah", "Debra", "Dee", "Deianira", "Deidamia", "Deka", "Del Carmen", "Del Cielo", "Del Corazon de Jesus", "Del Mar", "Del Milagro", "Del Pilar", "Del Rocio", "Del Rosario", "Del Sagr.C.de Jesus", "Del Sagrado Corazón", "Del Socorro", "Del Sol", "Del Solar", "Del Valle", "Delaney", "Deleandra", "Delfina", "Delia", "Delicia", "Delila", "Delilah", "Della", "Delma", "Delphine", "Delsie", "Delta", "Delu", "Delvis", "Demetria", "Demofila", "Dempsey", "Dena", "Denice", "Denisa", "Denise", "Denisse", "Denver", "Deogracia", "Deolinda", "Derfuta", "Derora", "Desiree", "Despina", "Destiny", "Deva", "Deverell", "Devi", "Devin", "Devon", "Devorah", "Devota", "Deyanira", "Dharma", "Dharvinder", "Diadema", "Diamanta", "Diamante", "Diamela", "Diana", "Diane", "Dianela", "Dianella", "Dianne", "Dianthe", "Diba", "Dibe", "Diella", "Digna", "Dilek", "Dilys", "Dimpna", "Dina", "Dinah", "Dinora", "Dinorah", "Dio", "Diomira", "Dionisia", "Dionne", "Dior", "Diorella", "Diosma", "Disa", "Dita", "Diva", "Divina", "Divna", "Doelia", "Dolly", "Dolores", "Domiciana", "Dominica", "Dominique", "Domitila", "Domiziana", "Domma", "Dommina", "Dona", "Donata", "Donatella", "Donatila", "Donella", "Donina", "Donna", "Dora", "Doralisa", "Dorana", "Dorcas", "Dore", "Doreen", "Dorelia", "Dorie", "Dorina", "Dorinda", "Doris", "Dorla", "Dorotea", "Dorothea", "Dorothy", "Dory", "Doyel", "Drever", "Drew", "Drina", "Drusila", "Drusilla", "Duam", "Duena", "Duka", "Dula", "Dulce", "Dulce Maria", "Dulcea", "Dulcinea", "Dustine", "Dyan", "Dyani", "Dyllis", "Dymphna", "Ealsa", "Eanwinda", "Eartha", "Easter", "Eavan", "Ebele", "Eber", "Ebony", "Ece", "Echo", "Eda", "Edana", "Edburga", "Edda", "Eddie", "Edelba", "Edelburga", "Edelia", "Edelina", "Edeline", "Edelira", "Edelma", "Edelmira", "Edeltruda", "Edelvais", "Edelweiss", "Eden", "Edena", "Edgarda", "Edie", "Edilburga", "Edilia", "Edilma", "Ediltrudis", "Edit", "Edita", "Edith", "Edlyn", "Edmee", "Edna", "Edria", "Eduarda", "Edurne", "Eduviges", "Eduvigis", "Eduvina", "Edwina", "Edythe", "Effie", "Efigenia", "Efrath", "Egipciaca", "Egle", "Eileen", "Eilene", "Eimi", "Einat", "Eira", "Eirene", "Ekaterina", "Ela", "Eladia", "Elaine", "Elais", "Elal", "Elata", "Elba", "Elbia", "Elcira", "Elda", "Eldora", "Elea", "Eleana", "Eleanor", "Electra", "Elena", "Eleni", "Eleonor", "Eleonora", "Eleora", "Eleuteria", "Elfrida", "Elia", "Eliana", "Eliane", "Elida", "Elide", "Elie", "Elilia", "Elin", "Elina", "Elis", "Elisa", "Elisabet", "Elisabeth", "Elisabetta", "Elise", "Elisea", "Elisenda", "Elisheba", "Elisheva", "Eliska", "Elissa", "Elita", "Eliza", "Elizabeth", "Elka", "Elke", "Ella", "Ellema", "Ellie", "Ellis", "Elma", "Elmina", "Elodia", "Elodie", "Eloisa", "Eloise", "Elsa", "Else", "Elsira", "Elu", "Eluhuei", "Eluney", "Elvia", "Elvina", "Elvira", "Ely", "Elysia", "Ema", "Emanuela", "Ember", "Emelia", "Emelie", "Emelina", "Emerald", "Emerita", "Emi", "Emilce", "Emilda", "Emilia", "Emiliana", "Emilie", "Emily", "Emiri", "Emma", "Emmanuelle", "Emperatriz", "Ena", "Enara", "Encarnacion", "Endora", "Enedina", "Eneida", "Enelsa", "Eneyen", "Engracia", "Enid", "Ennata", "Enola", "Enrica", "Enriqueta", "Enya", "Epifania", "Epistema", "Eranthe", "Erasma", "Ercilia", "Erica", "Erika", "Erin", "Erina", "Erlina", "Erlinda", "Erma", "Ermelinda", "Ermenilda", "Ermin", "Erminia", "Erna", "Ernestina", "Ernestine", "Eroteida", "Ervina", "Eryn", "Escolastica", "Eshe", "Esilda", "Esmeralda", "Esmirna", "Esperanza", "Essie", "Estefania", "Estela", "Estelle", "Ester", "Esther", "Estibaliz", "Estralita", "Estrella", "Etana", "Etania", "Etel", "Etelca", "Etelvina", "Etewa", "Ethana", "Ethel", "Etna", "Etta", "Eudocia", "Eudora", "Eudoxia", "Eufemia", "Eufrasia", "Eufrosina", "Eugenia", "Eukene", "Eulalia", "Eulalie", "Eumelia", "Eunice", "Eunomia", "Euprepia", "Euridice", "Eusebia", "Eustacia", "Eustelia", "Eustoquia", "Euterpe", "Eutrapia", "Eutropia", "Eva", "Evacsa", "Evadne", "Evana", "Evangelina", "Evangeline", "Evanthe", "Eve", "Evelia", "Evelina", "Eveline", "Evelyn", "Evette", "Evita", "Evonne", "Evora", "Exaltacion", "Expectacion", "Exuperancia", "Exuperia", "Eyen", "Eyota", "Ezilda", "Fabia", "Fabiana", "Fabiela", "Fabienne", "Fabiola", "Fadua", "Fairuz", "Faith", "Faizah", "Fala", "Fallon", "Fanny", "Fantine", "Fara", "Farah", "Faren", "Farica", "Farida", "Farisa", "Farrah", "Fatima", "Fausta", "Faustina", "Faustine", "Fawn", "Fawne", "Faye", "Fayina", "Fe", "Febe", "Febes", "Federica", "Fedora", "Fedra", "Feigue", "Felcia", "Felice", "Felicia", "Felicidad", "Felicisima", "Felicitas", "Felicite", "Felicity", "Felipa", "Felisa", "Fennella", "Fermina", "Fern", "Feronia", "Fiamma", "Ficela", "Fidela", "Fidelity", "Filia", "Filipa", "Filis", "Filomena", "Filonila", "Filotea", "Finola", "Fiona", "Fionna", "Fionnula", "Fiorella", "Fiorenza", "Fisseha", "Flaminia", "Flavia", "Flaviana", "Flavina", "Fleta", "Fleur", "Flor", "Flor Maria", "Flora", "Florence", "Florencia", "Florentina", "Florentine", "Floria", "Floriana", "Florida", "Florinda", "Flower", "Fola", "Fonda", "Fortuna", "Fortunata", "Fotina", "Fran", "Franca", "Francamarina", "Frances", "Francesca", "Francia", "Francina", "Francine", "Francisca", "Francisca Romana", "Franka", "Frantxina", "Fraya", "Freda", "Fredeswinda", "Fresia", "Freya", "Frida", "Frieda", "Fructuosa", "Fu Yao", "Fucsia", "Fulvia", "Fumiko", "Fusca", "Fuscienne", "Gabina", "Gabriela", "Gabriella", "Gabrielle", "Gaby", "Gada", "Gae", "Gaelle", "Gaia", "Gail", "Gal", "Gala", "Galadriel", "Galatea", "Gale", "Galena", "Gali", "Galia", "Galina", "Galit", "Galya", "Gamada", "Gamliel", "Ganesa", "Garine", "Garland", "Garmet", "Gaudencia", "Gavina", "Gayane", "Gayle", "Gaynor", "Gea", "Gelasia", "Gema", "Gemina", "Gemini", "Gemma", "Gena", "Genara", "Generosa", "Genesis", "Genet", "Geneva", "Genevieve", "Genna", "Genoveva", "Georgette", "Georgia", "Georgina", "Geraldina", "Geraldine", "Gerarda", "Gerardesca", "Gerda", "Geri", "Germaine", "Germana", "Gertrude", "Gertrudis", "Gessica", "Geva", "Ghaliya", "Ghislaine", "Giacinta", "Giancarla", "Gianella", "Gianina", "Gianna", "Giannina", "Gigi", "Gilana", "Gilberta", "Gilberte", "Gilda", "Gillian", "Gimena", "Gina", "Ginebra", "Ginette", "Ginger", "Ginny", "Gioconda", "Gioia", "Giona", "Giorgia", "Giorgina", "Giovanna", "Gisa", "Gisela", "Giselda", "Gisele", "Gisella", "Giselle", "Gislena", "Gita", "Gitana", "Gitel", "Githa", "Gittel", "Giulia", "Giuliana", "Giulietta", "Gladis", "Gladys", "Glafira", "Glauco", "Gleda", "Glenda", "Glenna", "Gliceria", "Gloria", "Glory", "Glynis", "Godeberta", "Godiva", "Golda", "Goldie", "Gorgonia", "Grace", "Gracia", "Graciana", "Gracias", "Gracie", "Graciela", "Gradiva", "Grainne", "Grania", "Grata", "Grazia", "Grear", "Grecia", "Greer", "Gregorina", "Gremy", "Greta", "Gretchen", "Gretel", "Gretta", "Grette", "Grisel", "Grisela", "Griselda", "Guadalupe", "Guaraci", "Gudelia", "Gudula", "Guendalina", "Guenevere", "Guila", "Guillermina", "Guinevere", "Guiomar", "Guisell", "Guitl", "Guivorada", "Gulnara", "Gundelina", "Gundena", "Guri", "Guvendolina", "Gwen", "Gwenda", "Gwendolyn", "Gwyn", "Gwyneth", "Gwynyber", "Gypsy", "Gytha", "Habiba", "Habrilia", "Hada", "Hadara", "Hadas", "Hadasa", "Hadassa", "Hadassah", "Hadiya", "Hadley", "Haidee", "Haldis", "Halel", "Haley", "Hali", "Halima", "Hallie", "Halona", "Hana", "Hanae", "Hanan", "Hania", "Hanka", "Hanna", "Hannah", "Hanne", "Hanzila", "Hara", "Harley", "Harmony", "Harriet", "Hartley", "Haru", "Haruka", "Harumi", "Hasna", "Hateya", "Hattie", "Hava", "Haya", "Haydee", "Hayes", "Hayfa", "Haylee", "Hayley", "Hazel", "Hea", "Heather", "Hebe", "Hecuba", "Hedda", "Hedia", "Hedva", "Hedwig", "Hedy", "Hedya", "Hefziba", "Hei", "Heidi", "Heidy", "Helda", "Helen", "Helena", "Helene", "Helga", "Heli", "Helia", "Heliana", "Helki", "Heloisa", "Heloise", "Helua", "Helvecia", "Helvetia", "Helvia", "Hemilce", "Henedina", "Henning", "Henriatta", "Hera", "Heraclea", "Heripsime", "Hermelinda", "Hermenegilda", "Herminda", "Herminia", "Hermosa", "Hersilia", "Herundina", "Hesper", "Hester", "Hestia", "Hibiscus", "Hikari", "Hila", "Hilah", "Hilaire", "Hilaria", "Hilda", "Hilde", "Hildegarda", "Hildegardis", "Hildegunda", "Hildelita", "Hildemar", "Hilen", "Hili", "Hillary", "Hiltrudis", "Hinda", "Hipatia", "Hiromi", "Hisa", "Hisae", "Hodaia", "Hodaya", "Holley", "Holli", "Holly", "Honey", "Honora", "Honorata", "Honoria", "Honorina", "Hortensia", "Hosanna", "Hoshi", "Hoshiko", "Hossana", "Huapi", "Huara", "Huayra", "Huberta", "Huelen", "Hueneken", "Huenu", "Huerquen", "Huilen", "Humbelina", "Humiliada", "Huyana", "Hyacinth", "Hye", "Hypatia", "Ia", "Iael", "Iafa", "Iamit", "Iana", "Ianella", "Ianina", "Ianthe", "Iara", "Iavnela", "Iazmin", "Ibel", "Ibi", "Iciar", "Ida", "Idalia", "Idalina", "Idana", "Idola", "Idonia", "Ieesha", "Iehudit", "Ifigenia", "Ignacia", "Ik", "Ilana", "Ilanit", "Ilaria", "Ildara", "Ileana", "Ilia", "Ilian", "Iliana", "Illary", "Illed", "Ilona", "Iluminada", "Ilva", "Ilve", "Iman", "Imelda", "Imogene", "Imperia", "Imperio", "Ina", "Inan", "Inaqui", "Inda", "Indes", "India", "Indiana", "Indigo", "Indira", "Indra", "Ines", "Inez", "Inga", "Ingrid", "Inha", "Inmaculada", "Inti", "Ioana", "Iola", "Iolana", "Iolanthe", "Iona", "Ione", "Ionit", "Iorana", "Iori", "Iracema", "Iraida", "Irana", "Iratze", "Irene", "Iriel", "Irina", "Irinea", "Iris", "Irma", "Irma de la Paz", "Irmelin", "Irmina", "Iru", "Irune", "Irupe", "Isabel", "Isabela", "Isabella", "Isabelle", "Isabis", "Isadora", "Isaura", "Isberga", "Iselda", "Isha", "Isidora", "Isis", "Isla", "Isleta", "Ismenia", "Isoke", "Isolda", "Isolde", "Isolina", "Isondu", "Israela", "Ita", "Itati", "Itisuri", "Itzel", "Itziar", "Ivalú", "Ivana", "Ivanka", "Ivanna", "Ivon", "Ivonne", "Ivory", "Ivy", "Iziar", "Jacinda", "Jacinta", "Jacinthe", "Jackie", "Jaclyn", "Jacoba", "Jacquelina", "Jacqueline", "Jacqui", "Jacy", "Jada", "Jade", "Jadranka", "Jadwige", "Jadzia", "Jael", "Jaen", "Jafit", "Jaia", "Jaim", "Jaimie", "Jaina", "Jainen", "Jala", "Jalila", "Jamie", "Jamila", "Jamilah", "Jana", "Janaina", "Jane", "Janet", "Janice", "Janina", "Janine", "Janis", "Janna", "Janneth", "Jaquelina", "Jardena", "Jari", "Jasmine", "Jasna", "Jasury", "Java", "Javan", "Javiera", "Jay", "Jaya", "Jaydi", "Jayma", "Jazmin", "Jazmine", "Jazz", "Jeanette", "Jeanne", "Jeannette", "Jedfri", "Jedva", "Jelena", "Jemima", "Jena", "Jenara", "Jenay", "Jendayi", "Jenifer", "Jenna", "Jennifer", "Jenny", "Jensine", "Jeri", "Jerusalen", "Jerusha", "Jerzy", "Jesica", "Jess", "Jessamine", "Jesse", "Jessica", "Jessie", "Jesuana", "Jesumina", "Jewell", "Jezabel", "Jezebel", "Jill", "Jillian", "Jimena", "Jin", "Jinx", "Jira", "Joana", "Joann", "Joanna", "Joanne", "Joaquina", "Jobina", "Jocasta", "Jocelyn", "Jodi", "Jody", "Joela", "Joelle", "Joelliane", "Johana", "Johanna", "Joia", "Jolan", "Jolanta", "Jolene", "Jolie", "Joline", "Jonina", "Jora", "Jordana", "Jordane", "Jorgelina", "Josefa", "Josefina", "Joselin", "Joselina", "Josephina", "Josephine", "Josette", "Journey", "Jova", "Jovita", "Joy", "Joyce", "Juana", "Juana del Pilar", "Juanita", "Jucunda", "Judit", "Judith", "Judy", "Juji", "Julia", "Juliana", "Julianna", "Julianne", "Julie", "Julieta", "Juliette", "Julinka", "Julisa", "Julissa", "July", "Jumai", "Jun", "June", "Juno", "Justa", "Justina", "Justine", "Justise", "Kaatje", "Kacey", "Kachina", "Kachine", "Kacy", "Kaede", "Kaela", "Kaethe", "Kaia", "Kaiane", "Kaira", "Kairos", "Kala", "Kalama", "Kalanit", "Kalare", "Kalea", "Kalei", "Kalen", "Kalena", "Kaley", "Kali", "Kalika", "Kalila", "Kalinda", "Kaliska", "Kalli", "Kalonice", "Kalya", "Kalyca", "Kama", "Kamala", "Kameko", "Kamena", "Kamila", "Kamilah", "Kamilia", "Kandace", "Kande", "Kandice", "Kanene", "Kanika", "Kanti", "Kanya", "Kaori", "Kaoru", "Kapriel", "Kara", "Karel", "Karen", "Karena", "Karenina", "Karibe", "Karida", "Karima", "Karimah", "Karin", "Karina", "Karine", "Karis", "Karla", "Karli", "Karma", "Karolina", "Karumanta", "Kasi", "Kasia", "Kasinda", "Kassia", "Kassidy", "Katarina", "Kate", "Katelin", "Katelyn", "Katerina", "Katharina", "Katharine", "Katherina", "Katherine", "Kathie", "Kathleen", "Kathrin", "Katia", "Katie", "Katja", "Katlyn", "Katrien", "Katrina", "Katu", "Katya", "Katyana", "Kaveri", "Kavindra", "Kay", "Kaya", "Kayla", "Kaylee", "Kayra", "Kaysa", "Keara", "Kedma", "Keelan", "Keelie", "Keelin", "Keely", "Kefira", "Kei", "Keiki", "Keiko", "Keila", "Keili", "Keisha", "Kekona", "Kelby", "Kelda", "Kelila", "Kellee", "Kelli", "Kellie", "Kelly", "Kelsey", "Kenaan", "Kenda", "Kendi", "Kendra", "Kennedy", "Kennis", "Kenti", "Kenya", "Kenza", "Kenzie", "Keona", "Keren", "Kerrin", "Kerry", "Kesare", "Kesia", "Keturah", "Kevina", "Kevyn", "Keyvia", "Khalidah", "Khalile", "Kharis", "Kia", "Kiana", "Kiara", "Kiden", "Kiele", "Kiley", "Kilian", "Killa", "Kim", "Kimberly", "Kimey", "Kimi", "Kina", "Kinen", "Kinesburga", "Kineswida", "Kineta", "King", "Kinneret", "Kinsey", "Kioko", "Kiona", "Kira", "Kiran", "Kirsten", "Kirstina", "Kisa", "Kishi", "Kiska", "Kissa", "Kita", "Kitra", "Kitty", "Kiyomi", "Kizzy", "Klarissa", "Kohana", "Kohar", "Koko", "Kolina", "Kona", "Kora", "Koral", "Koren", "Kospi", "Koto", "Krista", "Kristen", "Kristin", "Kristina", "Kristine", "Krysia", "Krystal", "Kumi", "Kumiko", "Kunti", "Kuri", "Kusi", "Kuyen", "Kwanita", "Kyara", "Kyla", "Kyleigh", "Kylia", "Kyna", "Kynthia", "Kyoko", "Kyra", "Kyrene", "Lacey", "Lacie", "Lacy", "Lael", "Laetitia", "Lahela", "Lahila", "Lahuen", "Laia", "Laial", "Laila", "Laima", "Laina", "Lais", "Lala", "Lalage", "Lalasa", "Lalita", "Lan", "Lane", "Lani", "Lanin", "Lara", "Laraine", "Lareina", "Lari", "Larina", "Larisa", "Larissa", "Lark", "Lasca", "Lassie", "Lastenia", "Lateefah", "Latife", "Latika", "Latisha", "Latona", "Laudelina", "Laudomia", "Laura", "Laurana", "Laureana", "Lauren", "Laurencia", "Laurie", "Laurinda", "Laveda", "Laverne", "Lavina", "Lavinia", "Laya", "Layla", "Lazara", "Lea", "Leah", "Leandra", "Leanne", "Leba", "Leda", "Ledah", "Ledicia", "Leia", "Leigh", "Leiko", "Leila", "Leilani", "Leire", "Leiza", "Lelia", "Lelica", "Lelis", "Leliz", "Lena", "Lenda", "Lene", "Lenis", "Lenore", "Leocadia", "Leocricia", "Leola", "Leoma", "Leona", "Leonarda", "Leonela", "Leonie", "Leonila", "Leonilda", "Leonor", "Leonora", "Leopolda", "Leora", "Leota", "Lerida", "Lesley", "Leslie", "Lessia", "Letha", "Leticia", "Letitia", "Letizia", "Levana", "Levia", "Levina", "Lewa", "Lewana", "Lexine", "Leya", "Leylen", "Li", "Lia", "Liadan", "Liana", "Liat", "Libby", "Libe", "Libel", "Libera", "Libertad", "Liberty", "Libia", "Librada", "Licalel", "Liceria", "Licia", "Licina", "Lida", "Lidia", "Liduvina", "Lien", "Liesel", "Lighuen", "Ligia", "Lihue", "Lihuel", "Lihuen", "Lil", "Lila", "Lilac", "Lilah", "Lilaj", "Lilen", "Lilia", "Lilian", "Liliana", "Lilina", "Liliosa", "Lilith", "Lilli", "Lillian", "Lilo", "Lily", "Limay", "Limber", "Lin", "Lina", "Linda", "Lindsay", "Lindsey", "Lindy", "Linette", "Linka", "Linnea", "Lioba", "Lionela", "Liora", "Liria", "Lirida", "Lirit", "Lis", "Lisa", "Lisana", "Lisbet", "Lise", "Lisette", "Lisi", "Lissa", "Liuba", "Liv", "Livia", "Liz", "Liza", "Lizbeth", "Lizzy", "Ljudmila", "Llanca", "LLanina", "Llanque", "Loana", "Logan", "Loida", "Lois", "Lokelani", "Lola", "Lona", "Lonna", "Lore", "Lorea", "Loreana", "Loredana", "Lorelei", "Loreley", "Lorena", "Lorenza", "Loreta", "Loreto", "Loretta", "Lori", "Loriana", "Lorinda", "Lorna", "Lorraine", "Loruhama", "Lorujama", "Lotte", "Lotus", "Louisa", "Louise", "Lourdes", "Love", "Lua", "Luana", "Lucelia", "Lucerito", "Lucerne", "Lucero", "Lucia", "Luciana", "Lucie", "Lucienne", "Lucila", "Lucile", "Lucilla", "Lucille", "Lucina", "Lucinda", "Lucine", "Lucrecia", "Lucretia", "Lucy", "Lucyna", "Ludivina", "Ludmila", "Ludmilla", "Ludovica", "Ludwika", "Luisa", "Luisana", "Luise", "Luisella", "Luisina", "Lujan", "Lukina", "Lulu", "Lumila", "Luna", "Lupe", "Lupita", "Lurdes", "Lusin", "Lutgarda", "Luvina", "Luxmi", "Luz", "Luz Marina", "Lydia", "Lyla", "Lylon", "Lynda", "Lynette", "Lynn", "Lynne", "Lyris", "Lysandra", "Maaian", "Maartje", "Mabel", "Macarena", "Macaria", "Machiko", "Maciel", "Mackenzie", "Macra", "Macrina", "Mada", "Maddie", "Madelaine", "Madeleine", "Madeline", "Madge", "Madison", "Madlen", "Madonna", "Madra", "Madrona", "Mady", "Mae", "Maeko", "Maelia", "Maelle", "Maeve", "Mafalda", "Magali", "Magan", "Magda", "Magdalen", "Magdalena", "Magdalene", "Magdiel", "Magena", "Maggie", "Magia", "Magnolia", "Magumi", "Maha", "Mahala", "Mahalia", "Mahdis", "Maheera", "Mai", "Maia", "Maialen", "Maian", "Maiara", "Maiatza", "Maica", "Maida", "Maika", "Maike", "Maila", "Maile", "Mailen", "Mailin", "Maille", "Maimara", "Maimuna", "Mainque", "Maira", "Maire", "Mairea", "Maisa", "Maisha", "Maisie", "Maita", "Maitane", "Maite", "Maiten", "Maitena", "Maitreya", "Maitza", "Maive", "Maj", "Makala", "Makena", "Makenna", "Maku", "Malaika", "Malana", "Malen", "Malena", "Malguen", "Malia", "Malina", "Malinda", "Malisa", "Malka", "Mallory", "Malva", "Malvina", "Malvina Argentina", "Mamelta", "Mana", "Manami", "Manda", "Mandara", "Mandisa", "Mandy", "Mangena", "Manoli", "Manon", "Manque", "Mansi", "Manuela", "Manuelita", "Manuk", "Manya", "Maña", "Mar", "Mara", "Maral", "Marana", "Maravillas", "Marcela", "Marcelina", "Marcia", "Marciana", "Marcie", "Marcy", "Maren", "Marga", "Margalit", "Margaret", "Margarita", "Margaux", "Margot", "Marguerite", "Mari", "Maria", "Maria Angel", "Maria Aranzazu", "Maria Begoña", "Maria Belen", "Maria d.l.Concepcion", "Maria d.l.Victorias", "Maria d.t.los Santos", "Maria de Aranzazu", "Maria de Begoña", "Maria de Belen", "Maria de Cinta", "Maria de Fatima", "Maria de Guadalupe", "Maria de la Almudena", "Maria de la Cerca", "Maria de la Cruz", "Maria de la Gloria", "Maria de la Gracia", "Maria de la Macarena", "Maria de la Merced", "Maria de la O", "Maria de la Paloma", "Maria de la Paz", "Maria de la Soledad", "Maria de las Ermitas", "Maria de las Gracias", "Maria de las Nieves", "Maria de Lourdes", "Maria de Lujan", "Maria de Montserrat", "Maria de Nuria", "Maria del Consuelo", "Maria del Huerto", "Maria del Mar", "Maria del Montserrat", "Maria del Olvido", "Maria del Pilar", "Maria del Pino", "Maria del Sol", "Maria del Valle", "Maria delos Milagros", "Maria Fatima", "Maria Gracia", "Maria Guadalupe", "Maria Inmaculada", "Maria Jesus", "Maria Jose", "Maria Noel", "Maria Nuria", "Maria Olvido", "Maria Sol", "Mariah", "Marialis", "Mariam", "Mariamar", "Marian", "Mariana", "Marianel", "Marianela", "Marianella", "Mariangel", "Mariangela", "Mariangeles", "Marianina", "Marianne", "Mariatu", "Maribel", "Maricel", "Mariciel", "Maricruz", "Marie", "Mariel", "Mariela", "Marien", "Mariet", "Marietta", "Marife", "Marigold", "Marikena", "Marilda", "Marile", "Marilein", "Marilen", "Marilena", "Marilia", "Marilin", "Marilina", "Marilisa", "Marilu", "Marilyn", "Marina", "Marine", "Marinel", "Marines", "Marion", "Mariposa", "Mariquela", "Mariquena", "Maris", "Marisa", "Marisabel", "Marisel", "Marisela", "Marisha", "Marisol", "Marissa", "Marisu", "Marite", "Marjeta", "Marjorie", "Marla", "Marlene", "Marlo", "Marmara", "Marnina", "Maro", "Marsala", "Marsha", "Marta", "Martha", "Marti", "Martina", "Martirio", "Marvel", "Marvela", "Marwa", "Mary", "Marysol", "Masada", "Masengu", "Mashe", "Matai", "Matana", "Mathea", "Mathilda", "Mathilde", "Matilda", "Matilde", "Matrika", "Matrona", "Maude", "Maura", "Maureen", "Maurina", "Mauve", "Mavi", "Mavis", "Maxelinda", "Maxima", "Maximiliana", "Maximina", "Maxine", "Maxive", "May", "Maya", "Mayari", "Mayda", "Mayerly", "Maylen", "Maylis", "Maynao", "Mayon", "Mayra", "Mayte", "Mayumi", "Mazal", "Mectildis", "Meda", "Medea", "Medusa", "Meg", "Megan", "Megara", "Meggie", "Megumi", "Mehedi", "Meher", "Mei", "Meira", "Meirav", "Meital", "Meka", "Mel", "Melani", "Melania", "Melanie", "Melantha", "Melany", "Melba", "Mele", "Melen", "Melia", "Melian", "Melibea", "Melin", "Melina", "Melinda", "Meline", "Melisa", "Melisenda", "Melissa", "Melita", "Melitona", "Melodie", "Melody", "Melosa", "Melusina", "Melva", "Menna", "Menodora", "Menuje", "Merced", "Mercedes", "Mercia", "Mercuria", "Mercy", "Meredith", "Meriel", "Merle", "Merlina", "Merry", "Meryl", "Mesalina", "Messina", "Metrodora", "Meulen", "Mia", "Micaela", "Mical", "Michaela", "Michela", "Michelle", "Michiko", "Micol", "Midori", "Mieke", "Migina", "Mignon", "Miguelina", "Mijal", "Mika", "Mikaela", "Mikaili", "Miki", "Mila", "Milagro", "Milagros", "Milay", "Milburga", "Milca", "Mildred", "Milea", "Milena", "Milene", "Milenia", "Milenka", "Mileva", "Milia", "Miliani", "Militina", "Millante", "Millaray", "Millay", "Millicent", "Milva", "Milwida", "Mimi", "Min", "Minda", "Mindy", "Minerva", "Miniya", "Minka", "Minna", "Minnie", "Miqueas", "Mira", "Mirabel", "Miranda", "Mireia", "Mireille", "Mirela", "Mirella", "Miren", "Mirena", "Mireya", "Miriam", "Mirian", "Miriana", "Mirielle", "Mirjana", "Mirl", "Mirla", "Mirna", "Mirra", "Mirta", "Mirtha", "Miryam", "Mishcat", "Misky", "Missy", "Mistica", "Misty", "Mitsumi", "Mitzi", "Miwa", "Miya", "Miyen", "Miyuki", "Moana", "Mocha", "Modesta", "Modesty", "Moesha", "Moira", "Molly", "Mona", "Monica", "Monika", "Monique", "Monserrat", "Montana", "Montserrat", "Mora", "Morela", "Morella", "Morena", "Morgan", "Morgana", "Morgance", "Moria", "Moriah", "Morna", "Moroti", "Mouna", "Moussia", "Moya", "Muna", "Munay", "Munira", "Muñay", "Muriel", "Murphey", "Murphy", "Mushka", "Musidora", "Muskaan", "Mylene", "Myoren", "Myra", "Myriam", "Myrna", "Myrtle", "Naara", "Naavah", "Nabila", "Nacira", "Nadia", "Nadin", "Nadina", "Nadine", "Nadira", "Nadra", "Nadyria", "Nahair", "Nahia", "Nahiara", "Nahila", "Nahima", "Nahime", "Nahir", "Nahue", "Naia", "Naiara", "Nailah", "Naillanka", "Naima", "Naimid", "Naiquen", "Nair", "Naira", "Nairi", "Najat", "Nakita", "Nala", "Nalani", "Nale", "Nalini", "Nallibe", "Nami", "Namie", "Namir", "Nan", "Nana", "Nancy", "Nani", "Nanine", "Naomi", "Napea", "Nara", "Narcisa", "Narcissa", "Narela", "Narella", "Narelle", "Narmada", "Narumi", "Nascha", "Naschel", "Nasha", "Nasia", "Nasira", "Natacha", "Natala", "Natali", "Natalia", "Natalie", "Natalin", "Nataly", "Natalya", "Natane", "Natasha", "Natesa", "Nathalia", "Nathalie", "Natividad", "Natsue", "Natsumi", "Nausica", "Nayadet", "Nayeli", "Nayla", "Nayme", "Nazarena", "Nazaret", "Nazareth", "Nazaria", "Nazeli", "Nazira", "Neala", "Neci", "Neda", "Nediva", "Neena", "Neftali", "Nehueln", "Neila", "Nejamá", "Nekane", "Nela", "Nelda", "Nelia", "Nelida", "Nell", "Nella", "Nelly", "Nemesia", "Nenet", "Neola", "Neona", "Nerea", "Nereida", "Neri", "Neria", "Nerina", "Nerine", "Nerissa", "Nessa", "Neta", "Netali", "Netania", "Nevada", "Nevenka", "Newen", "Neysa", "Niamh", "Nicerata", "Nichole", "Nicki", "Nicolasa", "Nicole", "Nicoletta", "Nicolette", "Nicolina", "Nidia", "Nielsin", "Nieves", "Nika", "Nike", "Nikita", "Nikki", "Nila", "Nilce", "Nilda", "Nilia", "Nimah", "Nimfa", "Nimia", "Nimsi", "Nina", "Ninfodora", "Ninon", "Niobe", "Nira", "Nirit", "Nirma", "Nirvelli", "Nisela", "Nishan", "Nissa", "Nita", "Nitara", "Nitika", "Nitzana", "Nixie", "Nizam", "Noa", "Noah", "Noara", "Noe", "Noel", "Noelani", "Noeli", "Noelia", "Noella", "Noely", "Noemi", "Nohien", "Nokomis", "Nola", "Noleta", "Noma", "Nominanda", "Nonia", "Nontue", "Nora", "Norali", "Norberta", "Noreen", "Norell", "Nori", "Noriko", "Noris", "Norma", "Notburga", "Nour", "Nova", "Novella", "Novia", "Nubia", "Nuil", "Numilen", "Nuna", "Nuncia", "Nune", "Nunilo", "Nur", "Nuria", "Nuriel", "Nurit", "Nuriya", "Nuru", "Nyako", "Nydia", "Nyeki", "Nyoko", "Nysa", "Nyssa", "Nyx", "Obdulia", "Obelia", "Oceana", "Octavia", "Oda", "Odaia", "Odara", "Odel", "Odele", "Odelia", "Odell", "Odelsia", "Odera", "Odessa", "Odetta", "Odette", "Odila", "Odile", "Odilia", "Odina", "Ofelia", "Ofira", "Ohanna", "Okelani", "Oki", "Olalla", "Olathe", "Olaya", "Olena", "Olesia", "Oletha", "Olga", "Oliana", "Olimpia", "Olinda", "Oliva", "Olive", "Olivia", "Ollie", "Olmo", "Olwen", "Olympia", "Oma", "Omega", "Ona", "Ondina", "Oneida", "Onelia", "Onella", "Oni", "Onida", "Onna", "Onora", "Oona", "Opal", "Ophelia", "Oprah", "Ora", "Oralee", "Oralie", "Orela", "Orenda", "Orfilia", "Oria", "Orian", "Oriana", "Oriane", "Orianna", "Orieta", "Oriole", "Orit", "Orla", "Orlantha", "Orleans", "Orlee", "Orli", "Orly", "Orma", "Ornela", "Ornella", "Orosia", "Orquidea", "Orsa", "Osita", "Otilia", "Ova", "Oxana", "Oz", "Ozana", "Paciencia", "Page", "Paige", "Paine", "Painegour", "Pakuna", "Palaciata", "Paladia", "Palesa", "Palmiera", "Palmira", "Paloma", "Pam", "Pamela", "Pamelia", "Pampa", "Pandita", "Pandora", "Panphila", "Pansy", "Panthea", "Panya", "Paola", "Papina", "Parana", "Parca", "Park", "Parsceve", "Pascale", "Pascasia", "Pascha", "Pascua", "Pasha", "Pat", "Patience", "Patil", "Patrice", "Patricia", "Patsy", "Patty", "Paula", "Paule", "Paulette", "Paulina", "Pauline", "Pavla", "Paxton", "Payton", "Paz", "Pazia", "Peace", "Pearl", "Pegeen", "Peggy", "Pelagia", "Pemba", "Penelope", "Peninah", "Peninna", "Penney", "Pennie", "Penny", "Penthea", "Peony", "Peri", "Perla", "Perpedigna", "Perpetua", "Perri", "Perseveranda", "Persis", "Peta", "Petra", "Petrona", "Petronila", "Petula", "Petunia", "Phaedra", "Phedra", "Phemia", "Phila", "Philana", "Philine", "Philippa", "Philomena", "Phoebe", "Phoenix", "Phylicia", "Phyliss", "Phyllis", "Pia", "Piedad", "Piencia", "Pier", "Piera", "Pierina", "Pierrette", "Pietra", "Pilar", "Pillai", "Pilmayquen", "Pina", "Piper", "Piren", "Pirra", "Piuque", "Placida", "Plautila", "Pleasance", "Polidora", "Polimnia", "Polixena", "Polly", "Poloma", "Pomona", "Pomposa", "Poppy", "Poria", "Porsche", "Portia", "Potamia", "Potamiena", "Potenciana", "Praga", "Praxedes", "Preciosa", "Primavera", "Primitiva", "Primrose", "Princesa", "Prisca", "Priscila", "Priscilla", "Priya", "Proba", "Procopia", "Prosdocia", "Proserpina", "Protasia", "Prudence", "Prudencia", "Prudenciana", "Prue", "Prunella", "Psyche", "Publia", "Pura", "Purificacion", "Purity", "Purna", "Purva", "Pyralis", "Pyrce", "Pyrena", "Pythia", "Queena", "Queenie", "Queila", "Quella", "Quenby", "Querubina", "Quetzal", "Quidel", "Quilla", "Quillen", "Quimey", "Quinn", "Quinta", "Quintina", "Quionia", "Quirita", "Quiteria", "Quiterie", "Rabab", "Rachael", "Rachel", "Rachelle", "Radcliffe", "Radegunda", "Radella", "Radinka", "Radmilla", "Rae", "Rafa", "Rafaela", "Raffaella", "Raghad", "Rahue", "Raihue", "Raina", "Rainey", "Raisa", "Raissa", "Raizel", "Raja", "Rajel", "Rama", "Ramlaf", "Ramya", "Ran", "Randall", "Randie", "Randy", "Rane", "Rani", "Rania", "Raphaela", "Raquel", "Raquildis", "Rashida", "Rasia", "Rasine", "Ratri", "Raulina", "Rawnie", "Rayen", "Raylen", "Rayna", "Razia", "Raziya", "Rea", "Reba", "Rebeca", "Rebecca", "Rebekah", "Rebi", "Red", "Redenta", "Regina", "Regine", "Rei", "Reidun", "Reina", "Reineldis", "Remedios", "Remy", "Rena", "Renata", "Renate", "Renee", "Renita", "Renny", "Reparada", "Resham", "Restituta", "Reva", "Revocata", "Reyes", "Reyhan", "Rhea", "Rheann", "Rheanna", "Rhiamon", "Rhiannon", "Rhoda", "Rhodanthe", "Rhode", "Rhona", "Rhonda", "Ria", "Ribca", "Ribka", "Ricarda", "Richelle", "Rickie", "Rida", "Rigel", "Rihana", "Riley", "Rimca", "Rina", "Riona", "Ripsima", "Risia", "Rita", "Riva", "River", "Rivka", "Roberta", "Robertina", "Robi", "Robin", "Robine", "Robyn", "Rochelle", "Rocio", "Rocio de Luna", "Rocio del Cielo", "Rohana", "Rolanda", "Roma", "Romaine", "Romana", "Romane", "Romanela", "Romeli", "Romelia", "Romilda", "Romina", "Romola", "Romula", "Rona", "Ronit", "Ronli", "Roquina", "Rori", "Rory", "Rosa", "Rosa de Lima", "Rosabel", "Rosalba", "Rosali", "Rosalia", "Rosalina", "Rosalind", "Rosalinda", "Rosamunda", "Rosana", "Rosangela", "Rosanne", "Rosario", "Rosaura", "Rose", "Roseanne", "Rosella", "Rosemary", "Rosetta", "Rosi", "Rosiberica", "Rosicler", "Rosina", "Rosine", "Rosmari", "Rowena", "Roxana", "Roxanne", "Roxina", "Roxy", "Rubi", "Rubina", "Rubria", "Ruby", "Rudra", "Rue", "Rufina", "Rumer", "Runa", "Rusti", "Rustica", "Rut", "Ruth", "Rutha", "Ryanne", "Ryba", "Rylee", "Ryu", "Saba", "Sabi", "Sabina", "Sabine", "Sabirah", "Sabra", "Sabrina", "Sachi", "Sade", "Sadie", "Sadirar", "Safara", "Saffi", "Saffron", "Safina", "Safira", "Safiya", "Safo", "Sagara", "Sage", "Sahara", "Sahira", "Saiguen", "Sakari", "Sakti", "Sakura", "Salaberga", "Salena", "Salene", "Salimah", "Salina", "Sally", "Salma", "Salome", "Saloua", "Salvadora", "Salvia", "Salviana", "Salvina", "Samanta", "Samantha", "Samar", "Samara", "Samay", "Samira", "Samirah", "Sana", "Sancha", "Sancia", "Sandi", "Sandia", "Sandra", "Sandrine", "Sandy", "Sandya", "Santina", "Sapphire", "Sara", "Sarah", "Sarai", "Saree", "Sari", "Sarifi", "Sarina", "Sarisha", "Sasha", "Saskia", "Sathya", "Satin", "Satinka", "Satu", "Saturnina", "Sauken", "Saula", "Savanna", "Savannah", "Sayi", "Sayra", "Sayumi", "Sayuri", "Scarlet", "Scarlett", "Scheherezada", "Scherin", "Sebastiana", "Secunda", "Secundina", "Seda", "Seema", "Sefora", "Segunda", "Sela", "Selena", "Selene", "Selia", "Selima", "Selina", "Selma", "Selva", "Sema", "Semele", "Semira", "Semiramis", "Senalda", "Senorina", "Senta", "Septimia", "Serafina", "Seraj", "Serapia", "Serena", "Serenela", "Serilda", "Serotina", "Serwa", "Severa", "Severina", "Seyoung", "Shadi", "Shadia", "Shaiel", "Shaine", "Shajar", "Shake", "Shakira", "Shami", "Shamira", "Shana", "Shanata", "Shandy", "Shanelle", "Shania", "Shannon", "Shantal", "Shantay", "Sharbat", "Shari", "Sharman", "Sharon", "Shavonne", "Shawn", "Shawna", "Shayen", "Shayna", "Shayndel", "Shea", "Sheba", "Sheena", "Sheila", "Sheina", "Shela", "Shelby", "Sheli", "Shelley", "Shelly", "Sherry", "Shifra", "Shika", "Shin", "Shina", "Shino", "Shira", "Shirel", "Shiri", "Shirley", "Shirly", "Shivani", "Shoam", "Shoshana", "Shoshanah", "Shulamit", "Shulinen", "Siagria", "Siamara", "Sibila", "Sibilina", "Sibley", "Sibyl", "Sibyla", "Sidney", "Sidonia", "Siena", "Sigal", "Sigalit", "Siglinda", "Sigourney", "Sigrada", "Sigrid", "Sila", "Silene", "Silva", "Silvana", "Silver", "Silveria", "Silvia", "Silvina", "Silvina dl Guadalupe", "Sima", "Simcha", "Simja", "Simona", "Simone", "Sincletica", "Sinead", "Sinforosa", "Sintiques", "Siobhan", "Siomara", "Sion", "Sira", "Siria", "Siroun", "Sissy", "Sistina", "Sitara", "Siv", "Sive", "Sixtine", "Skyle", "Skyler", "Slavica", "Sloan", "Sloane", "Socorro", "Sofia", "Soi", "Soka", "Sol", "Sol de", "Solana", "Solange", "Solcire", "Soledad", "Soleil", "Solita", "Solvejg", "Somy", "Sonia", "Sonsoles", "Sonya", "Sopatra", "Sophia", "Sophie", "Sophronia", "Sophya", "Sora", "Soraya", "Sorcha", "Sotera", "Spica", "Stacey", "Stacia", "Stacy", "Star", "Stefani", "Stefania", "Stefanie", "Steffi", "Steffie", "Stella", "Stella Maris", "Stephanie", "Stephenie", "Sterina", "Sterling", "Stevie", "Suanne", "Suki", "Suleidy", "Sultana", "Sumaia", "Sumi", "Sumie", "Summer", "Summit", "Surai", "Surak", "Susan", "Susana", "Susanna", "Susannah", "Susima", "Suyai", "Suyay", "Suzanne", "Suzette", "Svetlana", "Sybil", "Sydelle", "Sydney", "Sylvia", "Sylvie", "Syna", "Tabata", "Tabatha", "Tabina", "Tabitha", "Taci", "Taciana", "Tacita", "Tae Ry", "Taffi", "Tahirah", "Taiana", "Taiel", "Taima", "Taina", "Tair", "Tais", "Taka", "Takara", "Talasi", "Tali", "Talia", "Talin", "Tallulah", "Tama", "Tamah", "Tamar", "Tamara", "Tamary", "Tamasha", "Tami", "Tamia", "Tamika", "Tamina", "Tammy", "Tanaka", "Tani", "Tania", "Tanisha", "Tanner", "Tannsy", "Tanya", "Tara", "Tarbula", "Tarsicia", "Tarsila", "Taryn", "Tasha", "Tathiana", "Tatiana", "Tatsuki", "Tatyana", "Tawana", "Tawnie", "Tawny", "Taylor", "Tayra", "Taysa", "Teal", "Tecia", "Tecla", "Tehila", "Tehuel", "Tekla", "Telma", "Telquilda", "Temira", "Temis", "Tempest", "Teocleta", "Teoctiste", "Teodelina", "Teodequilda", "Teodolinda", "Teodora", "Teodosia", "Teodota", "Teofania", "Teofila", "Teopista", "Teoritgida", "Tereciela", "Terence", "Terentia", "Teresa", "Teresita", "Terry", "Tertia", "Teshi", "Tesia", "Tesira", "Tess", "Tessa", "Thadea", "Thais", "Thalassa", "Thalia", "Thana", "Thea", "Thekla", "Thelma", "Thema", "Themis", "Theodora", "Theodosia", "Theone", "Theophila", "Thera", "Theresa", "Therese", "Thomasina", "Thora", "Thyra", "Tiara", "Tiare", "Tiaret", "Tica", "Ticiana", "Tiffany", "Tigridia", "Timandra", "Tina", "Tiponya", "Tirsa", "Tirza", "Tivona", "Tiziana", "Toby", "Tomaida", "Toni", "Topaz", "Tori", "Toshi", "Tova", "Tovah", "Toyah", "Tracey", "Tracy", "Traichen", "Transito", "Trella", "Tresa", "Treva", "Triana", "Tricia", "Trifena", "Trifina", "Trifonia", "Trifosa", "Trilby", "Trina", "Trinidad", "Trista", "Tristana", "Trixie", "Trude", "Trudy", "Tryphena", "Tuesday", "Tujuaylites", "Tulia", "Turquesa", "Tyara", "Tyler", "Tyne", "Tyra", "Tzigane", "Tzipora", "Uciel", "Udele", "Udine", "Ula", "Uliana", "Ulla", "Ultima", "Uma", "Umbelina", "Ummi", "Unity", "Urania", "Urbana", "Uria", "Uriah", "Uriana", "Uriel", "Urit", "Ursa", "Ursala", "Ursula", "Ursulina", "Usue", "Uta", "Ute", "Uxue", "Val", "Vala", "Valda", "Valencia", "Valentina", "Valentine", "Valeria", "Valerie", "Valeska", "Valonia", "Valquiria", "Valvurga", "Vanda", "Vanesa", "Vanessa", "Vania", "Vanina", "Vaniria", "Vanna", "Vanora", "Vanya", "Varda", "Varinia", "Varvara", "Vashti", "Vassety", "Veda", "Velia", "Velika", "Velma", "Venecia", "Veneranda", "Venetia", "Venezia", "Venus", "Venusta", "Vera", "Veredigna", "Verena", "Verenice", "Verna", "Verne", "Verona", "Veronica", "Veronika", "Vesna", "Vespera", "Vesta", "Vevila", "Vevina", "Vicky", "Victoria", "Victorina", "Vida", "Vidonia", "Vilma", "Viola", "Violet", "Violeta", "Violetta", "Virgefortis", "Virginia", "Viridiana", "Viridis", "Virna", "Virtudes", "Visitacion", "Vissia", "Vita", "Vitalia", "Vitalina", "Vitoria", "Vittoria", "Viveka", "Vivian", "Viviana", "Vivienne", "Vivina", "Vondra", "Waded", "Wakanda", "Walburga", "Walen", "Walkiria", "Walkyria", "Walquiria", "Waltruda", "Wanda", "Wanelen", "Waneta", "Wara", "Wayra", "Wechi", "Welcome", "Wenda", "Wendell", "Wendy", "Wereburga", "Whitney", "Wixay", "Wilhelmina", "Willa", "Willka", "Willow", "Wilma", "Wilona", "Winda", "Winema", "Winfred", "Winifred", "Winifreda", "Winni", "Winola", "Winona", "Witburga", "Wivina", "Wren", "Wulen", "Wulfilda", "Wynne", "Xanthe", "Xantifa", "Xaviera", "Xena", "Xenia", "Xiana", "Xiara", "Ximena", "Xiomara", "Xoana", "Xuxa", "Xylia", "Xylona", "Ya", "Yachne", "Yadia", "Yael", "Yaela", "Yaiza", "Yal", "Yam", "Yamandu", "Yamay", "Yamel", "Yamila", "Yamile", "Yanel", "Yanela", "Yanella", "Yanessis", "Yanet", "Yangjin", "Yanil", "Yanina", "Yanira", "Yara", "Yariela", "Yarmilla", "Yaroslawa", "Yasmin", "Yasmina", "Yatel", "Yavel", "Yazmin", "Yboty", "Ye Jee", "Yeji", "Yemina", "Yenien", "Yepa", "Yerimen", "Yesenia", "Yesica", "Yesmina", "Yeva", "Yexalem", "Yinan", "Yochonon", "Yojana", "Yoko", "Yolanda", "Yonah", "Yonina", "Yoninah", "Yori", "Yoseli", "Yovela", "Yukari", "Yuki", "Yukii", "Yumbi", "Yumi", "Yune", "Yunka", "Yvette", "Yvonne", "Zada", "Zafiro", "Zahara", "Zahira", "Zahirah", "Zahra", "Zaida", "Zaila", "Zainab", "Zaira", "Zakia", "Zalika", "Zaltana", "Zamira", "Zandra", "Zara", "Zarah", "Zarifa", "Zarina", "Zaura", "Zaza", "Zdenka", "Zea", "Zehava", "Zelda", "Zelia", "Zelma", "Zelmira", "Zena", "Zenaida", "Zenaide", "Zenia", "Zenobia", "Zephyr", "Zerlinda", "Zetta", "Zeva", "Zevida", "Zia", "Zigana", "Zila", "Zina", "Zinia", "Zinnia", "Zita", "Ziva", "Zizi", "Zoe", "Zohar", "Zoia", "Zoie", "Zoila", "Zola", "Zona", "Zora", "Zoraida", "Zosia", "Zosima", "Zsa zsa", "Zula", "Zulaica", "Zuleika", "Zulema", "Zulima", "Zulma", "Zulmara", "Zunilda", "Zuriel", "Zuza", "Zuzanny", "Zysli"];
            } else {
                $cantidad = 812;
                $cuenta = ["Aarón", "Abel", "Abraham", "Adán", "Adolfo", "Adrián", "Adriel", "Agustín", "Alan", "Alberto", "Aldo", "Alejandro", "Alexis", "Alfonso", "Alí", "Alonso", "Alvaro", "Amado", "Américo", "Andrés", "Ángel", "Aníbal", "Antonio", "Aquiles", "Arcadio", "Ariel", "Armando", "Arón", "Arsenio", "Arthuro", "Arturo", "Asier", "Atlas", "Augusto", "Aurelio", "Axel", "Baldomero", "Baltasar", "Bartolo", "Bartolomé", "Basilio", "Bautista", "Bayardo", "Belarmino", "Belisario", "Beltrán", "Benedicto", "Benicio", "Benicio", "Benigno", "Benito", "Benjamín", "Benoni", "Bernardino", "Bernardo", "Bertrand", "Beto", "Beto", "Bladimir", "Blaise", "Blas", "Bonifacio", "Boris", "Borja", "Brahim", "Brais", "Brandon", "Braulio", "Bruno", "Bryan", "Byron", "Caleb", "Calvin", "Calvino", "Camilo", "Cándido", "Carlos", "Carmelo", "Carmine", "Casiano", "Casimiro", "Cayetano", "Celestino", "Cenobio", "César", "Cheo", "Cipriano", "Cirilo", "Ciro", "Claudio", "Clavel", "Clemente", "Clímaco", "Clovis", "Colm", "Conrado", "Constante", "Constantino", "Cornelio", "Cosimo", "Cosme", "Crescencio", "Crisanto", "Crispín", "Cristian", "Cristóbal", "Custodio", "Cyrano", "Dagoberto", "Dairo", "Dámaso", "Damián", "Daniel", "Dante", "Dardo", "Darian", "Dariano", "Darío", "Dastan", "David", "Daxton", "Delfín", "Delfino", "Delfos", "Delmar", "Delson", "Demetrio", "Demián", "Denis", "Derian", "Derick", "Desmond", "Diego", "Dimas", "Dino", "Dionisio", "Donato", "Dorian", "Duván", "Eamon", "Eddison", "Edgar", "Edmundo", "Eduardo", "Efráin", "Efrén", "Einar", "Eitan", "Elden", "Eleazar", "Elgar", "Elián", "Elías", "Elidoro", "Elio", "Eliot", "Eliseo", "Elmer", "Eloy", "Elvin", "Elwood", "Emiliano", "Emilio", "Emmerich", "Enrique", "Eric", "Ernesto", "Eron", "Eryk", "Esteban", "Estevan", "Eusebio", "Eustaquio", "Evaristo", "Ezequiel", "Fabián", "Fabio", "Fabrizio", "Facundo", "Fausto", "Favian", "Federico", "Feliciano", "Felipe", "Félix", "Fergus", "Fermín", "Fermo", "Fernando", "Ferrán", "Fidel", "Fidelio", "Filiberto", "Finn", "Finnian", "Fiorello", "Fitz", "Flavio", "Florián", "Floriano", "Flynn", "Fortunato", "Foster", "Francisco", "Franco", "Francoise", "Franklin", "Fraser", "Fredrico", "Fritz", "Fulgencio", "Fulton", "Gabriel", "Gael", "Galileo", "Gavino", "Genaro", "Gennaro", "Geraldo", "Geraldo", "Gerardo", "Germán", "Gerónimo", "Gervasio", "Giancarlo", "Gideon", "Gilberto", "Gildardo", "Gilderoy", "Gilderoy", "Gilmer", "Gino", "Giorgio", "Giraldo", "Giuseppe", "Godofredo", "González", "Gonzalo", "Gregor", "Gregorio", "Gualberto", "Gualtiero", "Guillermo", "Gulliver", "Gurgen", "Gustavio", "Gustavo", "Guthrie", "Gwyn", "Hadrien", "Haiden", "Håkon", "Hal", "Halden", "Hamilton", "Hamlet", "Hampton", "Hansel", "Harlan", "Harold", "Harris", "Haruki", "Harvey", "Hassan", "Havel", "Hayden", "Heath", "Heathcliff", "Héctor", "Hélder", "Hendrick", "Hércules", "Hermes", "Hernán", "Hesham", "Hilario", "Hilton", "Hiroshi", "Homero", "Honorio", "Horacio", "Howard", "Huberto", "Hugo", "Humberto", "Hussein", "Iakob", "Ian", "Ibrahim", "Icaro", "Ignacio", "Iker", "Ilario", "Ildefonso", "Ilian", "Ilya", "Imanol", "Indalecio", "Ingo", "Inocencio", "Iñaki", "Iñigo", "Irving", "Isaac", "Isaias", "Isaiel", "Isandro", "Isidoro", "Iskander", "Ismael", "Isra", "Ithiel", "Iván", "Ivar", "Ives", "Ivo", "Ivor", "Jabari", "Jackson", "Jacob", "Jaden", "Jair", "Jairo", "Jalen", "Jamil", "Jared", "Jarek", "Jareth", "Jarrett", "Jasper", "Javier", "Javon", "Jaxon", "Jefferson", "Jeovanny", "Jeremías", "Jethro", "Jett", "Joaquin", "Joel", "Jorge", "José", "Josiah", "Josué", "Jovan", "Jovani", "Jovanny", "Juan", "Julián", "Julio", "Justin", "Justino", "Kael", "Kaelan", "Kai", "Kaiden", "Kairo", "Kaleb", "Kalvin", "Kameron", "Kamil", "Kamilo", "Kamran", "Karim", "Kaspar", "Kasper", "Keaton", "Keegan", "Keith", "Kellan", "Kelvin", "Kendrick", "Kenneth", "Kenzo", "Kevin", "Khaled", "Kian", "Kianu", "Kieran", "Killian", "Kingston", "Knox", "Kody", "Korbin", "Kristian", "Kurt", "Kyle", "Kyler", "Kylian", "Laird", "Lamont", "Landon", "Landry", "Langston", "Larry", "Lars", "Lautaro", "Lázaro", "Leandro", "Leif", "Leighton", "Leland", "Lennon", "Lennox", "Leonardo", "Leo", "Leonel", "Leónidas", "Leopoldo", "Lester", "Leví", "Liam", "Linden", "Linder", "Lino", "Linton", "Lionel", "Logan", "Lorenzo", "Lucas", "Luciano", "Lucio", "Luigi", "Luis", "Luisito", "Luther", "Lysander", "Macario", "Magnus", "Mahir", "Makoto", "Malcolm", "Malik", "Manuel", "Marcelo", "Marcos", "Mariano", "Mario", "Marlon", "Martín", "Martino", "Masato", "Mateo", "Mathias", "Matías", "Mauricio", "Maurizio", "Maverick", "Maximiliano", "Máximo", "Melchor", "Merlin", "Micah", "Michael", "Miguel", "Milan", "Miller", "Milton", "Misael", "Moisés", "Morgan", "Moritz", "Mustafa", "Myles", "Myron", "Nabil", "Nael", "Nahuel", "Naldo", "Natan", "Nathan", "Nathaniel", "Nehemías", "Nelson", "Némesis", "Nereo", "Nestor", "Néstor", "Néstor", "Neville", "Newton", "Niall", "Nicanor", "Nicolás", "Nikita", "Nilo", "Nilton", "Nilton", "Nimrod", "Nino", "Niven", "Nixon", "Noam", "Noble", "Noé", "Noémi", "Nolan", "Nolán", "Norberto", "Norman", "Nour", "Nuno", "Nygel", "Nyles", "Ñaco", "Ñandú", "Ñete", "Ñico", "Ñoño", "Obadías", "Oberto", "Ocean", "Octaviano", "Octavio", "Odín", "Odon", "Oktay", "Olaf", "Olegario", "Olindo", "Oliver", "Omar", "Omran", "Onésimo", "Onofre", "Orazio", "Orellana", "Orestes", "Orfeo", "Orlando", "Orson", "Orville", "Osberto", "Óscar", "Osias", "Osiris", "Osman", "Osmar", "Osric", "Ossian", "Osvaldo", "Oswaldo", "Otavio", "Othello", "Othón", "Otto", "Ovidio", "Oziel", "Pablo", "Paco", "Pancho", "Pánfilo", "Paris", "Parker", "Pascual", "Patricio", "Paul", "Pavel", "Pedro", "Pelayo", "Pellegrino", "Percival", "Percy", "Peregrino", "Peyton", "Philibert", "Phoenix", "Pierce", "Piers", "Pietro", "Pio", "Plácido", "Plinio", "Porter", "Prescott", "Preston", "Primo", "Prudencio", "Quetzal", "Quim", "Quirino", "Quirós", "Radamés", "Rafael", "Raimundo", "Rainer", "Rainiero", "Ramiro", "Ramón", "Raúl", "Raulo", "Ravi", "Regino", "Reinaldo", "Remigio", "Remo", "Remy", "Renato", "Ricardo", "Rigel", "Rigoberto", "Rinaldo", "Roberto", "Rocco", "Roderick", "Roderico", "Rodrigo", "Roldán", "Román", "Romualdo", "Rómulo", "Ronny", "Roque", "Rosendo", "Royston", "Rubén", "Rufino", "Ruslán", "Rustam", "Sabas", "Sabino", "Sadiel", "Sajid", "Salim", "Salman", "Salomón", "Salvador", "Samuel", "Sandro", "Sansón", "Santiago", "Saúl", "Sawyer", "Saxon", "Scott", "Sebastián", "Selim", "Señén", "Serafín", "Sergio", "Seth", "Severo", "Sheldon", "Sheridan", "Shimon", "Silvano", "Silvestre", "Simeón", "Simón", "Sócrates", "Solano", "Solón", "Sorin", "Spencer", "Stan", "Stanislao", "Stanislaw", "Stefan", "Stuart", "Tácito", "Taddeo", "Tadeo", "Talon", "Tanner", "Tarek", "Tarik", "Tate", "Taylor", "Tejeroñez", "Tennyson", "Tenzin", "Tenzing", "Teo", "Terrence", "Thaddeus", "Thane", "Theo", "Theodore", "Thiago", "Thibault", "Tiberio", "Tiberius", "Timoteo", "Tito", "Tobías", "Tobin", "Tomás", "Torben", "Torin", "Torrance", "Trent", "Tristan", "Troy", "Troye", "Tyler", "Tyrell", "Tyrone", "Ubal", "Uberto", "Ugo", "Ulises", "Umberto", "Urbano", "Uriel", "Uvaldo", "Valdemar", "Valentín", "Valentino", "Valerio", "Vance", "Vardan", "Vartan", "Vasco", "Vaughan", "Vaughn", "Venceslao", "Vernon", "Vicente", "Vicenzo", "Víctor", "Vidal", "Víktor", "Vinay", "Vinicio", "Vinnie", "Virgilio", "Vital", "Vítor", "Vitorio", "Vivaldo", "Vivek", "Vladímir", "Voss", "Vyacheslav", "Walter", "Warren", "Wesley", "William", "Wyatt", "Xabier", "Xander", "Xavier", "Xenón", "Ximeno", "Yael", "Yael", "Yago", "Yahir", "Yamil", "Yandel", "Yann", "Yannick", "Yared", "Yash", "Yasin", "Yefren", "Yehoshua", "Yehuda", "Yerai", "Yeray", "Yeriel", "Yerko", "Yeshua", "Yoav", "Yohan", "Yohann", "Yonatan", "Yordan", "Yosif", "Youssef", "Yovani", "Yovanny", "Yulian", "Yuri", "Yusef", "Yustin", "Yusuf", "Zacarías", "Zadkiel", "Zafiro", "Zahir", "Zaid", "Zain", "Zaire", "Zander", "Zarama", "Zayd", "Zayn", "Zedekiah", "Zeki", "Zenas", "Zenón", "Zephyr", "Zephyrin", "Zerachiel", "Zethan", "Zhi", "Zhivago", "Zidan", "Zigmund", "Zinedine", "Zion", "Ziv", "Zivko", "Zoltan", "Zoltán", "Zoran", "Zorion", "Zoroastro", "Zuberí", "Zuhair", "Zuriel"];
            };
            $userData = new Data([
                'apellido' => $request->input('apellido'),
                'base' => $cuenta,
                'nivel' => $request->input('juego'),
                'usuario' => 1,
                'total' => $cantidad,
                'resultado' => null
            ]);
            $user = User::create([
                'familia' => $request->input('familia'),
                'password' => bcrypt($request->input('password'))
            ]);
            $user->Data()->save($userData);
            return redirect('/nameapp/login');
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en registro: ' . $th->getMessage());

            return redirect('/nameapp/registro')
                ->with([
                    'mensajeError' => true, 'mensaje' => 'Error al registrar el usuario. Intente mas tarde.',
                    'css' => 'danger'
                ]);
        }
    }

    public function pedido()
    {
        try {
            $usuarioId = session('user_id');
            $usuario = session('usuario');
            $datosPartida = Data::where('user_id', $usuarioId)->first();
            $nombres = $datosPartida->base;
            if ($datosPartida->nivel == 'sumar') {
                if ($datosPartida->definido == $usuario) {
                    return response()->json([
                        'activo' => false,
                        'nivel' => 'sumar'
                    ]);
                } else {
                    return response()->json([
                        'nombres' => $nombres,
                        'apellido' => $datosPartida->apellido,
                        'activo' => true,
                        'nivel' => 'sumar'
                    ]);
                }
            } elseif ($datosPartida->nivel == 'solitario') {
                return response()->json([
                    'nombres' => $nombres,
                    'apellido' => $datosPartida->apellido,
                    'elegidos' => $datosPartida->resultado,
                    'activo' => true,
                    'nivel' => 'solitario'
                ]);
            } elseif ($datosPartida->nivel == 'restar') {
                $totalNombres = count($nombres);
                $cuantoSacar = 0;
                if ($datosPartida->usuario == $usuario) {
                    if ($totalNombres > 1000) {
                        $cuantoSacar = 150;
                    } else if ($totalNombres > 500) {
                        $cuantoSacar = 50;
                    } else if ($totalNombres >  70) {
                        $cuantoSacar = 30;
                    } else if ($totalNombres >  17) {
                        $cuantoSacar = 5;
                    } else {
                        $cuantoSacar = 1;
                    }
                    return response()->json([
                        'nombres' => $nombres,
                        'porcentaje' => $totalNombres,
                        'apellido' => $datosPartida->apellido,
                        'activo' => true,
                        'nivel' => 'restar',
                        'sacar' => $cuantoSacar
                    ]);
                } else {
                    return response()->json([
                        'activo' => false,
                        'nivel' => 'restar'
                    ]);
                }
            } elseif ($datosPartida->nivel == 'puntuar') {
                if ($datosPartida->definido == null) {
                    return response()->json([
                        'nombres' => $datosPartida->base,
                        'apellido' => $datosPartida->apellido,
                        'activo' => true,
                        'nivel' => 'puntuar'
                    ]);
                };
                if ($datosPartida->definido == $usuario) {
                    return response()->json([
                        'activo' => false,
                        'nivel' => 'puntuar'
                    ]);
                } else {
                    return response()->json([
                        'nombres' => $datosPartida->base,
                        'apellido' => $datosPartida->apellido,
                        'activo' => true,
                        'nivel' => 'puntuar'
                    ]);
                }
            } elseif ($datosPartida->nivel == 'resultado') {
                $resultados = $datosPartida->resultado;
                $totalesPorNombre = [];

                foreach ($resultados as $resultado) {
                    $nombre = $resultado["nombre"];

                    $puntos = $resultado["puntos"];

                    if (isset($totalesPorNombre[$nombre])) {
                        $totalesPorNombre[$nombre]["puntos"] += $puntos;
                    } else {
                        $totalesPorNombre[$nombre] = ["nombre" => $nombre, "puntos" => $puntos];
                    }
                }

                usort($totalesPorNombre, function ($a, $b) {
                    return $a["puntos"] - $b["puntos"];
                });


                return response()->json([
                    'nombres' => $totalesPorNombre,
                    'apellido' => $datosPartida->apellido,
                    'activo' => true,
                    'nivel' => 'resultado'
                ]);
            }
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en pedido: ' . $th->getMessage());
            return response()->json([
                'activo' => false,
            ]);
        }
    }

    public function sacar(Request $request)
    {
        try {
            $datos = $request->input('nombres');
            $usuarioId = session('user_id');
            $usuario = session('usuario');
            $datosPartida = Data::where('user_id', $usuarioId)->first();
            if ($datosPartida->resultado == null) {
                $datosPartida->resultado = $datos;
                $datosPartida->definido = $usuario;
                $datosPartida->save();
                return response()->json(['success' => true]);
            } else {
                $resultado = $datosPartida->resultado;
                $resultado = array_merge($resultado, $datos);
                $datosPartida->base = array_unique($resultado);
                $datosPartida->resultado = null;
                $datosPartida->nivel = 'puntuar';
                $datosPartida->definido = null;
                $datosPartida->save();
                return response()->json(['success' => true]);
            }
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en sacar: ' . $th->getMessage());
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function solitario(Request $request)
    {
        try {
            $datos = $request->input('nombres');
            $usuarioId = session('user_id');
            $datosPartida = Data::where('user_id', $usuarioId)->first();
            $datosPartida->base = $datos;
            $datosPartida->nivel = 'puntuar';
            $datosPartida->definido = null;
            $datosPartida->save();
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en sacar: ' . $th->getMessage());
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function solitarioGuardar(Request $request)
    {
        try {
            $usuarioId = session('user_id');
            $datosPartida = Data::where('user_id', $usuarioId)->first();
            $datosPartida->base = $request->input('nombres');
            $datosPartida->resultado = $request->input('elegidos');
            $datosPartida->save();
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en sacar: ' . $th->getMessage());
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function restar(Request $request)
    {
        try {
            $datos = $request->input('nombres');
            $usuarioId = session('user_id');
            $usuario = session('usuario');
            $datosPartida = Data::where('user_id', $usuarioId)->first();
            $valorDatos = count($datosPartida->base);
            if ($valorDatos < 11) {
                $datosPartida->resultado = $datos;
                $datosPartida->nivel = 'puntuar';
                $datosPartida->definido = null;
                $datosPartida->save();
                return response()->json(['success' => true]);
            }
            $datosPartida->base = $datos;
            $datosPartida->usuario = ($usuario == 2) ? 1 : 2;
            $datosPartida->save();
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en restar: ' . $th->getMessage());
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function terminar(Request $request)
    {
        try {
            $datos = $request->input('resultado');
            $usuarioId = session('user_id');
            $usuario = session('usuario');
            $datosPartida = Data::where('user_id', $usuarioId)->first();
            if ($usuario == 0) {
                $datosPartida->resultado =  $datos;
                $datosPartida->nivel = 'resultado';
                $datosPartida->definido = null;
                $datosPartida->save();
                return response()->json(['success' => true]);
            }
            if ($datosPartida->definido == null) {
                $datosPartida->resultado = $datos;
                $datosPartida->definido = $usuario;
                $datosPartida->save();
                return response()->json(['success' => true]);
            }
            $resultado = $datosPartida->resultado;
            $datosPartida->resultado = array_merge($resultado, $datos);
            $datosPartida->nivel = 'resultados';
            $datosPartida->definido = null;
            $datosPartida->save();
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en terminar: ' . $th->getMessage());
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            Log::error('Excepción capturada en logout: ' . $th->getMessage());
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
