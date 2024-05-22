<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Competencial</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .pregunta {
            margin-bottom: 20px;
            display: none;
        }

        .pregunta-actual {
            display: block;
        }

        .pregunta-texto {
            font-weight: bold;
        }

        .respuesta-label {
            display: block;
            margin-bottom: 10px;
        }

        #resultado {
            margin-top: 20px;
            float: left;
        }

        #formulario-test {
            width: 50%;
        }

        canvas {
            max-width: 400px;
            margin-top: 0px;
        }

        .invisible-button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            width: 200px;
        }

        .selected {
            background-color: #ccc;
        }

        .progress-bar {
            margin-top: 5px;
            width: 100px;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin-left: 0px;
            display: inline-block;
            position: relative;
        }

        #resultado_progress {
            float: right;
            margin-top: 110px;
            height: 50px;
            margin-right: 550px;
        }

        .progress-bar .progress {
            height: 100%;
            border-radius: 10px;
            position: absolute;
            background-color: red;
            top: 0;
            left: 0;
        }

        #progress-bar-total {
            width: 200px;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin-left: 0px;
            display: none;
            position: relative;
        }

        #progress-bar-total .progress {
            height: 100%;
            border-radius: 10px;
            position: absolute;
            top: 0;
            left: 0;
        }

        #custom-progress-bar {
            width: 200px;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin-left: 0px;
            display: block;
            position: relative;
            margin-top: 20px;
        }

        #custom-progress-bar .progress {
            height: 100%;
            border-radius: 10px;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <h1>Test Competencial</h1>

    <form id="formulario-test">

        <div class="pregunta pregunta-actual">
            <p class="pregunta-texto">Pregunta 1: Si et preguntessin quines són les teves majors fortaleses, sabries contestar?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Sí, i podria posar exemples de com i on les poso en pràctica</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sí, però a vegades no sé com demostrar-les</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Sí, però no crec que em serveixin per emprendre</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">No, de fet m'agradaria tenir-les més clares</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: I les teves majors febleses?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Sí, i podria explicar com les estic millorant</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sí, però a vegades no sé com afrontar-les</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Sí, però no tinc molta idea de com millorar-les</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">No, de fet m'agradaria tenir-les més clares</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: Per a què creus que et servirà aquest exercici?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Per saber com millorar el meu perfil competencial</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Per saber què he de millorar com a emprenedor/a</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Per saber com emprendre amb èxit</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Per accedir als recursos i ajudes de l'Ajuntament</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 4: Què opines de la formació continua?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 5: Quan algú et critica…</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Analitzo i entenc les raons abans de comentar-ho</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Si m'ha sentat malament, ho dic</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">M'ho prenc malament, però callo</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Que diguin el que vulguin, a mi no m'importa</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 6: Busques opinions externes per revisar la teva forma de fer les coses?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 7: Et consideres una persona…</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Col·laborativa</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Més col·laborativa que competitiva</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Més competitiva que col·laborativa</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Competitiva</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 8: Quan trobes una informació interessant…</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">De seguida la comparteixo amb les persones a qui penso que els hi pot interessar</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Quan em trobo amb algú a qui li pugui interessar, li explico</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Me la guardo en algun lloc per poder-la tornar a consultar </button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">No acostumo a compartir-la a menys que no m'ho demanin</button>
        </div>




        <!---------------------------------------//
    // GRUP 2    PLANIFICACIÓ I ORGANITZACIÓ //
    //---------------------------------------->




        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 1: Quantes de les 5 característiques dels objectius SMART tenen els objectius que et marques normalment?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Totes! Tots els meus objectius sempre son: e(S)pecífics, (M)esurables, (A)ssolibles, (R)ellevant o realistes i (T)emps limitats o fitats</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">4 de les 5. Sempre em falta una perquè siguin SMART</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Entre 3 i 1</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Reconec que no sabia res dels objectius SMART</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: Si penses en els teus objectius, diries que es pot comprovar objectivament si s'han aconseguit o no, en un període concret?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: Quina afirmació et descriu millor?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Tinc un pla d'acció clar i sé on es podria millorar</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Soc capaç d'organitzar el meu temps, aconseguint la majoria d'objectius que em proposo</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Tot organitzant la meva activitat, tinc la sensació d'estar constantment apagant focs</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Em passo el dia fent coses i acabo el dia amb la sensació de no avançar</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 4: Com planifiques les teves tasques?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Les ordeno segons la seva importància, tenint en compte el temps que tinc per realitzar-les i els possibles imprevistos</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Tinc un llistat actualitzat de tasques pendents que vaig seguint per garantir que tot quedi fet</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Les defineixo de forma genèrica per poder-me garantir certa flexibilitat</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Prefereixo no perdre el temps planificant i passar directament a l'acció</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 5: Quina imatge et representa millor?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 6: Quantes d'aquestes eines utilitzes habitualment: calendari, agenda, recordatoris, notes, Trello o similars, fulles de càlcul?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Gairebé totes, de forma habitual</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Una mica més de la meitat, de forma habitual</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">La majoria, de forma esporàdica</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">De forma habitual, gairebé cap</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 7: Com afrontes les activitats amb data límit?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">M'organitzo per avançar de manera progressiva i arribar a temps</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Si no hi ha imprevistos, arribo amb una mica de marge i tot</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Arribo just, amb molt d'estrès en l'últim moment</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Acostumo a necessitar més temps de l'inicialment establert</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 8: "Com arribes als teus objectius? (Pensa en el temps, les energies, els recursos econòmics que has d'utilitzar)"</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>




        <!-------------------------//
    // GRUP 3    ADAPTABILITAT //
    //-------------------------->




        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 1: Què significa "canvi" per a tu?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Creixement</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Curiositat</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Incertesa</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Esforç</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: Quan et proposen un canvi (noves tasques, equips, maneres de procedir, etc.) valores més les coses bones que les coses dolentes?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: Quantes d'aquestes accions realitzes habitualment: llegir el diari, escoltar podcasts d'actualitat, anar a conferències/fires d'emprenedoria, debatre sobre què passa a la societat, informar-me sobre tendències en els negocis.</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Gairebé totes, de forma habitual</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Una mica més de la meitat, de forma habitual</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">La majoria, de forma esporàdica</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">De forma habitual, gairebé cap</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 4: Quina imatge et representa millor?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 5: Que tan sovint passa alguna cosa que no havies previst?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Casi mai</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Molt sovint</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 6: Quan passa, com et sents?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 7: Per què t'acostumen a buscar?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Perquè soc versàtil i se'm donen bé diferents coses</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Perquè soc sociable i sé relacionar-me amb gent molt diversa</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Perquè soc molt experta en el/s tema/es que m'interessen</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Perquè se'm dona molt bé executar el que m'indiquin</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 8: Què se't dona millor?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Assumir diferents rols, fins i tot definint les funcions i tasques corresponents</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Assumir diferents rols, però amb funcions i tasques definides prèviament</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Concentrar-me en un rol, però definint les funcions i tasques corresponents</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Concentrar-me en un rol, amb funcions i tasques definides prèviament</button>
        </div>




        <!-----------------------//
    // GRUP 4    RESILIÈNCIA //
    //------------------------>




        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 1: Com et veus?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: Tendeixes a fixar-te més en les teves febleses que en les teves fortaleses?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Casi mai</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Molt sovint</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: "Equivocar-se" és principalment…</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">la oportunitat per fer-ho millor</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">la necessitat de corregir-se</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">la frustració per no ser capaç</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">la demostració del fet que seria millor dedicar-se a una altra cosa</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 4: Normalment, després d'haver-te equivocat sents…</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">motivació o repte</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">perseverança o esforç</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">vergonya o decepció</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">bloqueig o resignació</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 5: Com portes l'estrès?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Prou bé, soc capaç de relativitzar els problemes i posar límits</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Bastant bé, però a vegades sento que no puc amb tot</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Bé, soc capaç d'aguantar alts nivells d'estrès</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Malament, m'estresso massa i de seguida</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 6: Per afrontar èpoques d'estrès o moments de frustració, quantes maneres coneixes?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 7: Com acostumes a afrontar les situacions difícils?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 8: Quantes d'aquestes activitats realitzes habitualment: parlar amb gent de confiança de com estic, escriure un diari, anar a activitats d'autoconeixement, seguir canals a les xarxes sobre el tema, llegir llibres/veure documentals/escoltar podcasts de creixement personal, demanar suport a un professional.</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Gairebé totes, de forma habitual</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Una mica més de la meitat, de forma habitual</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">La majoria, de forma esporàdica</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">De forma habitual, gairebé cap</button>
        </div>




        <!----------------------//
    // GRUP 5    NETWORKING	//
    //----------------------->




        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 1: Cerques oportunitats per a conèixer gent nova?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: Hi ha un esdeveniment de networking…</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: Quan coneixes a una persona nova, mostres curiositat per conèixer els seus gustos, interessos, capacitats, etc.?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 4: Si et tornes a trobar una persona amb qui has parlat una vegada...</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Recordo gairebé tot el que em va explicar</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Recordo alguna cosa del que em va explicar</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Recordo que l'he vist, però res més</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Normalment, ni me'n recordo que ens coneixem, m'ho han de recordar</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 5: Com està la teva xarxa de contactes ?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 6: Quantes d'aquestes accions has realitzat al llarg dels últims 3 mesos: he anat a un esdeveniment de networking, he muntat/actualitzat/repassat la meva llista de contactes, he parlat (per telèfon o per escrit) amb algun contacte, he quedat presencialment amb algun contacte, he invertit activament temps en les meves xarxes virtuals professionals (tipus LinkedIn)</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Gairebé totes</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Una mica més de la meitat</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Unes poques</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Gairebé cap</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 7: Sents que ajudes a altres persones a obtenir informació, solucionar problemes , assolir els seus objectius, etc.?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 8: Generes situacions que ajudin a crear connexions? (organitzar esdeveniments, proposar activitats socials grupals, posar en contacte a persones que poden tenir afinitats, etc.)</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>




        <!----------------------//
    // GRUP 6    NEGOCIACIÓ	//
    //----------------------->




        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 1: Abans de començar una negociació, t'informes sobre les possibilitats i limitacions que existeixen?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Detalladament</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Bastant</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Una mica</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Gairebé gens</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: Normalment, quan comença una negociació...</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Tinc clars tant els aspectes per mi irrenunciables com on estic disposada a cedir</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sé què vull obtenir, però no tinc del tot clar a què podria renunciar</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Tinc clars els aspectes en què no estic disposada a cedir i miro a veure què és el que puc guanyar a partir d’aquí</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Em deixo portar per la intuïció</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: Posar-se en el lloc de l'altre...</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">millora la qualitat de les relacions</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">ve bé de tant en tant</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">no sempre és necessari</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">fa perdre de vista els propis objectius</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 4: Abans de començar una negociació, reflexiones sobre les raons que pot tenir l'altra part per acceptar o rebutjar la teva oferta?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 5: Quan tens una idea que vols difondre, et resulta fàcil convèncer a altres persones?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 6: Has de convèncer a algú a fer alguna cosa que saps que no li ve de gust. Quin estil de persuasió s'aproxima més al teu?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">És possible que no t'ho passis bé, però necessito el teu suport</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Si m'ajudes, et tornaré el favor</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Veuràs que al final t'ho passaràs bé</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">He fet moltes coses per a tu, m'ho deus</button>
        </div>
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 7: Davant de diferents opinions proposes acords per a aconseguir un benefici comú</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Molt sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sovint</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">A vegades</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Casi mai</button>
        </div>

        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 8: Quan trobes una informació interessant…/p>
                <button type="button" class="invisible-button" onclick="toggleSelected(1);">IMAGEN</button>
                <button type="button" class="invisible-button" onclick="toggleSelected(2);">IMAGEN</button> <!-- IMATGES -->
                <button type="button" class="invisible-button" onclick="toggleSelected(3);">IMAGEN</button>
                <button type="button" class="invisible-button" onclick="toggleSelected(4);">IMAGEN</button>
        </div>


        <button type="button" id="siguiente-pregunta" onclick="mostrarSiguientePregunta()">Siguiente Pregunta</button>

        <button type="button" id="finalizar-test" style="display: none;" onclick="finalizarTest()">Finalizar Test</button>

        <div id="resultado" style="display: none;">
            <h2>Resultados del Test</h2>
            <p>Respuestas:</p>
            <ul id="lista-respuestas"></ul>
        </div>

        <div id="resultado_progress">
            <div class="progress-bar" id="progress-bar-1" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #85C1E9;"></div>
            </div>

            <div class="progress-bar" id="progress-bar-2" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #F5B7B1;"></div>
            </div>

            <div class="progress-bar" id="progress-bar-3" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #F0B27A;"></div>
            </div>
            <div class="progress-bar" id="progress-bar-4" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #F9E79F;"></div>
            </div>

            <div class="progress-bar" id="progress-bar-5" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #A2D9CE;"></div>
            </div>

            <div class="progress-bar" id="progress-bar-6" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #D2B4DE;"></div>
            </div>
            <div id="custom-progress-bar">
                <div class="progress" style="width: 0%; background-color: #AEAEAD;"></div>
            </div>
        </div>

        <div id="resultado_radar" style="float: right;">
            <canvas id="radar-chart" width="400"></canvas>
        </div>
    </form>

    <script>
        console.log("Este es un mensaje en la consola" + respuestasGrupo1);
        var respuestasGrupo1 = [];
        var respuestasGrupo2 = [];
        var respuestasGrupo3 = [];
        var respuestasGrupo4 = [];
        var respuestasGrupo5 = [];
        var respuestasGrupo6 = [];
        var respuestasPorGrupo = [];

        function calcularMedia(arr) {
            var suma = arr.reduce(function(acc, val) {
                return acc + val;
            }, 0);
            return suma;
        }



        var numeroPreguntaActual = 1;

        function mostrarSiguientePregunta() {
            var respuestaSeleccionada = document.querySelector('.pregunta.pregunta-actual .invisible-button.selected');
            if (!respuestaSeleccionada) {
                alert('Por favor, selecciona una respuesta antes de continuar.');
                return;
            }

            var respuestaValor = parseInt(respuestaSeleccionada.value);
            if (numeroPreguntaActual >= 1 && numeroPreguntaActual <= 8) {
                respuestasGrupo1.push(respuestaValor);
                console.log("Insert en Grupo 1" + respuestasGrupo1);
            } else if (numeroPreguntaActual >= 9 && numeroPreguntaActual <= 16) {
                respuestasGrupo2.push(respuestaValor);
                console.log("Insert en Grupo 2");
            } else if (numeroPreguntaActual >= 16 && numeroPreguntaActual <= 24) {
                respuestasGrupo3.push(respuestaValor);
                console.log("Insert en Grupo 3");
            } else if (numeroPreguntaActual >= 24 && numeroPreguntaActual <= 32) {
                respuestasGrupo4.push(respuestaValor);
                console.log("Insert en Grupo 4");
            } else if (numeroPreguntaActual >= 32 && numeroPreguntaActual <= 40) {
                respuestasGrupo5.push(respuestaValor);
                console.log("Insert en Grupo 5");
            } else if (numeroPreguntaActual >= 40 && numeroPreguntaActual <= 48) {
                respuestasGrupo6.push(respuestaValor);
                console.log("Insert en Grupo 6");
            }


            document.querySelector('.pregunta.pregunta-actual').classList.remove('pregunta-actual');

            var siguientePregunta = document.querySelector('.pregunta:nth-child(' + (numeroPreguntaActual + 1) + ')');
            if (siguientePregunta) {
                siguientePregunta.classList.add('pregunta-actual');
                numeroPreguntaActual++;

                if (numeroPreguntaActual === 48) {
                    document.getElementById('siguiente-pregunta').style.display = 'none';
                    document.getElementById('finalizar-test').style.display = 'block';
                }
            }

            actualizarBarraProgresoTotal();
        }

        function finalizarTest() {
            var respuestaSeleccionada = document.querySelector('.pregunta.pregunta-actual .invisible-button.selected');
            if (!respuestaSeleccionada) {
                alert('Por favor, selecciona una respuesta antes de continuar.');
                return;
            }
            var respuestaValor = parseInt(respuestaSeleccionada.value);
            respuestasGrupo6.push(respuestaValor);

            document.querySelector('.pregunta.pregunta-actual').classList.remove('pregunta-actual');
            document.getElementById('finalizar-test').style.display = 'none';
            document.getElementById('resultado').style.display = 'block';
            document.getElementById('custom-progress-bar').style.display = 'none';

            respuestasPorGrupo.push(calcularMedia(respuestasGrupo1));
            respuestasPorGrupo.push(calcularMedia(respuestasGrupo2));
            respuestasPorGrupo.push(calcularMedia(respuestasGrupo3));
            respuestasPorGrupo.push(calcularMedia(respuestasGrupo4));
            respuestasPorGrupo.push(calcularMedia(respuestasGrupo5));
            respuestasPorGrupo.push(calcularMedia(respuestasGrupo6));

            mostrarResultados();
        }

        function mostrarResultados() {
            if (document.getElementById('resultado_progress').style.display === 'none') {
                document.getElementById('resultado_progress').style.display = 'block';
            }
            var listaRespuestas = document.getElementById('lista-respuestas');
            listaRespuestas.innerHTML = '';

            var barrasProgreso = document.querySelectorAll('.progress-bar');

            // Títulos de los grupos de preguntas
            var titulosGrupos = [
                "DISPOSICIÓ A L'APRENENTATGE",
                'PLANIFICACIÓ I ORGANITZACIÓ',
                'ADAPTABILITAT',
                'RESILIÈNCIA',
                'NETWORKING',
                'NEGOCIACIÓ'
            ];

            // Iterar sobre cada grupo de respuestas
            for (var index = 0; index < barrasProgreso.length; index++) {
                var respuestasGrupo;
                switch (index) {
                    case 0:
                        respuestasGrupo = respuestasGrupo1;
                        break;
                    case 1:
                        respuestasGrupo = respuestasGrupo2;
                        break;
                    case 2:
                        respuestasGrupo = respuestasGrupo3;
                        break;
                    case 3:
                        respuestasGrupo = respuestasGrupo4;
                        break;
                    case 4:
                        respuestasGrupo = respuestasGrupo5;
                        break;
                    case 5:
                        respuestasGrupo = respuestasGrupo6;
                        break;
                    default:
                        console.error("No se encontró el grupo de respuestas para el índice " + index);
                        return;
                }

                // Calcular el porcentaje del progreso total
                var total = respuestasGrupo.reduce((acc, val) => acc + val, 0);
                var porcentaje = (total / (respuestasGrupo.length * 4)) * 100;

                var barraProgreso = barrasProgreso[index].querySelector('.progress');
                barraProgreso.style.width = porcentaje + '%';

                // Crear y agregar el título del grupo antes de la barra de progreso
                var titulo = document.createElement('div');
                titulo.textContent = titulosGrupos[index];
                titulo.classList.add('titulo-grupo'); // Puedes agregar una clase para estilizar los títulos si es necesario
                barrasProgreso[index].parentNode.insertBefore(titulo, barrasProgreso[index]);

                barrasProgreso[index].style.display = 'block';
            }

            var divRadar = document.getElementById('resultado_radar');
            divRadar.innerHTML = '';

            var canvas = document.createElement('canvas');
            canvas.id = 'radar-chart';
            canvas.width = 400;
            canvas.height = 400;
            divRadar.appendChild(canvas);

            var ctx = canvas.getContext('2d');
            var myRadarChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: titulosGrupos,
                    datasets: [{
                        data: respuestasPorGrupo,
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false,
                            position: 'bottom'
                        }
                    },
                    scales: {
                        r: {
                            suggestedMin: 0,
                            suggestedMax: 32
                        }
                    }
                }
            });
        }


        function actualizarBarraProgresoTotal() {
            var totalPreguntas = document.querySelectorAll('.pregunta').length;
            var porcentaje = (numeroPreguntaActual / totalPreguntas) * 100;
            var barraProgresoTotal = document.querySelector('#custom-progress-bar .progress');
            barraProgresoTotal.style.width = porcentaje + '%';

            var customProgressBar = document.querySelector('#custom-progress-bar .progress');
            customProgressBar.style.width = porcentaje + '%';
        }

        function toggleSelected(valor) {
            var buttons = document.querySelectorAll('.pregunta.pregunta-actual .invisible-button');
            buttons.forEach(function(button) {
                button.classList.remove("selected");
            });
            event.target.classList.add("selected");
            var respuestaSeleccionada = document.querySelector('.pregunta.pregunta-actual .invisible-button.selected');
            respuestaSeleccionada.value = valor;
        }
    </script>
</body>

</html>