NomMoisTable = new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
Ox = CadreCalendrier._x+10;
Oy = CadreCalendrier._y+10;
function AffichageCalendrier(f_mois, f_année) {
	//suppression du mois précédent
	for (i=1; i<=31; i++) {
		eval("NumeroJour"+i).removeTextField();
	}
	//adaptation (personnel) {1..12} --> {0..11}
	//en réalité on note de 1 à 12 ; mais ici, on note de 0 à 11 ! (allez savoir pourquoi)
	f_mois--;
	//création de l'objet date
	DateAffichée = new Date();
	f_semaine = 1;
	i = 1;
	NumeroJour = i;
	while (NumeroJour == i) {
		//définition de la date
		DateAffichée.setUTCFullYear(f_année, f_mois, i);
		NumeroJour = DateAffichée.getUTCDate();
		NomJour = DateAffichée.getUTCDay();
		NomJour = (NomJour == 0) ? (7) : NomJour;
		if (NomJour == 1 and i != 1) {
			f_semaine++;
		}
		X = Ox+20*(NomJour-1);
		Y = Oy+20*(f_semaine-1);
		//Objets texte affichant le numéro du jour : NumeroJour
		_root.createTextField("NumeroJour"+i, i*10, X, Y, 20, 20);
		with (eval("NumeroJour"+i)) {
			border = true;
			borderColor = "0x333333";
			background = true;
			backgroundColor = "0xD0D0D0";
			selectable = false;
			html = true;
			if (f_mois == Today.getMonth() and NumeroJour == Today.getDate() and f_année == Today.getFullYear()) {
				NumeroJour = "<b>"+NumeroJour;
				backgroundColor = "0xFF9999";
			}
			htmltext = "<P ALIGN='center'>"+NumeroJour;
		}
		//seulement pour la boucle
		i++;
		DateAffichée.setUTCFullYear(f_année, f_mois, i);
		NumeroJour = DateAffichée.getUTCDate();
	}
	NomMois = NomMoisTable[f_mois];
}
//Date d'aujoud'hui
Today = new Date();
mois = Today.getMonth()+1;
année = Today.getFullYear();
AffichageCalendrier(mois, année);
//Changement de mois
_root.MoisSuivant.onRelease = function() {
	if (mois == 12) {
		mois = 1;
		année++;
	} else {
		mois++;
	}
	AffichageCalendrier(mois, année);
};
_root.MoisPrécédant.onRelease = function() {
	if (mois == 1) {
		mois = 12;
		année--;
	} else {
		mois--;
	}
	AffichageCalendrier(mois, année);
};
