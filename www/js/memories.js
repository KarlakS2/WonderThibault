Array.prototype.unset = function(val){
var index = this.indexOf(val)
if(index > -1){
this.splice(index,1)
}
}

function actuScore(){
	document.getElementById("chiffre").innerHTML = score;
}

function carte(i)
{
	
	if(checked[i]==0)
	{
		
		
		if(X == 1)
		{
			checked[i]=1;
			document.getElementById("carte"+i).src = "Uploads/memories/photo"+cartes[i]+".jpg";
			if(cartes[i]!=cartes[selec1])
			{
				if(score-10>=0)
					score = score-10;
				selec2=i;
				X = 2;
				actuScore();
			}
			else
			{
				score = score+100;
				actuScore();
				X=0;
				reste.unset(selec1);
				reste.unset(i);
				if(reste.length == 0)
					finGame();
				selec1=0;
				select2=0;
			}
		}
		else if (X == 0)
		{
			document.getElementById("carte"+i).src = "Uploads/memories/photo"+cartes[i]+".jpg";
			X=1;
			selec1=i;
			checked[i]=1;
		}
		else if(X == 2)
		{
			document.href = ""; 
			document.getElementById("carte"+selec2).src = "Uploads/memories/photo0.jpg";
			document.getElementById("carte"+selec1).src = "Uploads/memories/photo0.jpg";
			checked[selec1]=0;
			checked[selec2]=0;
			X=0;
			selec1=0;
			selec2=0;
		}
	}
}

function initGame()
{
	var tab = new Array();
	for(var i=0;i<24;i++)
	{
		tab[i]=i+1;
		reste[i]=i+1;
		cartes[i]=0;
		checked[i]=0;
		document.getElementById("carte"+(i+1)).style.height = parseInt(document.getElementById("carte"+(i+1)).width)*1.4+"px";
	}
	checked[24]=0;
	
	var a = 1;
	while(tab.length>0 && a<20)
	{
		var indice = Math.floor(Math.random()*(tab.length));
		cartes[tab[indice]]=a;
		tab.unset(tab[indice]);
		var indice = Math.floor(Math.random()*(tab.length));
		cartes[tab[indice]]=a;
		tab.unset(tab[indice]);
		
		a++;
	}

	//montrerCartes();
}

function montrerCartes(){
	for(var i=1;i<(cartes.length+1);i++)
	{	
		document.getElementById("carte"+i).src = "Uploads/pictures/Fleur.jpg";
		document.getElementById("carte"+i).style.height = parseInt(document.getElementById("carte"+i).width)*1.4+"px";
	}
}

function finGame(){
	document.getElementById("termine").hidden = "";
	document.getElementById("score").value= score+"";
}

var X =0;
var selec1;
var selec2;
var score=0;
var cartes = new Array();
var reste = new Array();
var checked = new Array();
initGame();