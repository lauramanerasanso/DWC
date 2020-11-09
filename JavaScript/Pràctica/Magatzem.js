function Magatzem (num){
	
	this.numEstants = num;
	this.estants = new Array();

	this.inicialitza = inicialitza;
	function inicialitza(){
		for(var i=0; i<this.numEstants; i++){
			this.estants[i] = new Estant(i);
		}
	}

	this.showTaula = showTaula;
	function showTaula(){

		var txt = "<table class='table table-bordered'><thead style='text-align: center;''><tr>";
		for(var i=0; i<this.numEstants; i++){
			txt += "<th width='100px'>"+ i + "</th>";
		}
		txt +="</tr></thead><tbody>";
		for(var i=0; i<this.numEstants; i++){
			var estant = this.estants[i];
			txt += "<td width='100px'>"+ estant.printInfo() + "</td>";
		}
		txt += "</tr></tbody></table>";
		document.getElementById("taula").innerHTML = txt;
	}

	this.afegirPaquet = afegirPaquet;
	function afegirPaquet(p, pos){

		document.getElementById("info").innerHTML += "<p> El paquet està entrant al magatzem </p>";
		this.estants[pos].addPaquet(p);
		this.showTaula();
	}

	this.recollirPaquet = recollirPaquet;
	function recollirPaquet(numEstant){
		document.getElementById("info").innerHTML += "<p> El paquet està sent recolllit </p>";
		var p = this.estants[numEstant].paquet;
		this.estants[numEstant].recollirPaquet();
		this.showTaula();
		return p;
	}

	this.estantsLliures = estantsLliures;
	function estantsLliures(){
		var countLliures = 0;
		for(var i=0; i<this.estants.length; i++){
			if(this.estants[i].paquet == null){
				countLliures++;
			}
		}
		return countLliures;				
	}


	this.calculaPreus = calculaPreus;
	function calculaPreus(){

		document.getElementById("info").innerHTML += "<p> El preu dels paquets del magatzem és: </p>";
		this.estants.forEach(calculaPreuPaquet);
	}

	function calculaPreuPaquet(item, index, array){
		if(item.paquet!=null){
			var pvp = parseFloat(item.paquet.pes) * 0.75;
			var info = "<p>El paquet "+index+" té un preu de "+pvp+"€.</p>";
			document.getElementById("info").innerHTML += info;
		}
	}

	this.ordenaPes = ordenaPes;
	function ordenaPes(){

		document.getElementById("info").innerHTML += "<p> Els paquets ordenats per pes descendents queden així: </p>";
		this.estants.sort(function(a, b){
			var pesA = (a.paquet != null)? a.paquet.pes : 0; 
			var pesB = (b.paquet != null)? b.paquet.pes : 0; 
			return pesB - pesA; 
		});
	}

	this.paquetMesVell = paquetMesVell;
	function paquetMesVell(){
		document.getElementById("info").innerHTML += "<p> El paquet més vell del magatzem és: </p>";
		var dataComparar = new Date();
		var vell = null;
		for(var i=0; i<this.numEstants; i++){
			if(this.estants[i].paquet != null){
				var p = this.estants[i].paquet;
				if(this.estants[i].dEntrada < dataComparar){
					vell = p;
					dataComparar = p.dEntrada;
				}
			}
		}
		return vell;
	}

}