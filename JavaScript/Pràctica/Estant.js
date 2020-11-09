function Estant (id){
	
	this.id = id;
	this.paquet = null;
	this.dEntrada = null;
	this.dSortida = null;

	this.addPaquet = addPaquet;
	function addPaquet(p){
		document.getElementById("info").innerHTML += "<p> El paquet s'està afegint a l'estant </p>";
		this.paquet = p;
		this.dEntrada = new Date();
	}

	this.recollirPaquet = recollirPaquet;
	function recollirPaquet(){
		document.getElementById("info").innerHTML += "<p>El paquet està sortint de l'estant </p>";
		this.paquet = null;
		this.dEntrada = null;
		this.dSortida = new Date();
	}

	this.printInfo = printInfo;
	function printInfo(){

		var paquetInfo ="";
		if(this.paquet != null){
			paquetInfo += this.paquet.getInfo() + "<br/>";
			paquetInfo += this.formatEntrada() + "<br/>";
		}
		else if(this.sortida!= null){
			paquetInfo += "Paquet recollit <br/>";
			paquetInfo += this.formatSortida() + "<br/>";
		}
		else {
			paquetInfo += "No paquet";
		}

		return "<b>"+ this.id + "</b><br/>"+ paquetInfo;
	}

	this.formatEntrada = formatEntrada;
	function formatEntrada(){
		return printData(this.dEntrada);
	}

	this.formatSortida = formatSortida;
	function formatSortida(){
		return printData(this.dSortida);
	}

	function printData(d){
		return d.getHours() + ":"+
			   d.getMinutes() + ":"+
			   d.getSeconds();
	}

}