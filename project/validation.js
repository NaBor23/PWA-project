document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("slanje").onclick = function(event) {
        var slanjeForme = true;

        var poljeTitle = document.getElementById("naslov");
        var title = poljeTitle.value;
        if (title.length < 5 || title.length > 30) {
            slanjeForme = false;
            poljeTitle.style.border = "1px dashed red";
            document.getElementById("porukaNaslov").innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova!<br>";
        } else {
            poljeTitle.style.border = "1px solid green";
            document.getElementById("porukaNaslov").innerHTML = "";
        }

        var poljeAbout = document.getElementById("sazetak");
        var about = poljeAbout.value;
        if (about.length < 10 || about.length > 200) {
            slanjeForme = false;
            poljeAbout.style.border = "1px dashed red";
            document.getElementById("porukaSazetak").innerHTML = "Kratki sažetak mora imati između 10 i 100 znakova!<br>";
        } else {
            poljeAbout.style.border = "1px solid green";
            document.getElementById("porukaSazetak").innerHTML = "";
        }

        var poljeContent = document.getElementById("tekst");
        var content = poljeContent.value;
        if (content.length === 0) {
            slanjeForme = false;
            poljeContent.style.border = "1px dashed red";
            document.getElementById("porukaTekst").innerHTML = "Tekst vijesti mora biti unesen!<br>";
        } else {
            poljeContent.style.border = "1px solid green";
            document.getElementById("porukaTekst").innerHTML = "";
        }

        var poljeSlika = document.getElementById("slika");
        var pphoto = poljeSlika.value;
        if (pphoto.length === 0) {
            slanjeForme = false;
            poljeSlika.style.border = "1px dashed red";
            document.getElementById("porukaSlika").innerHTML = "Slika mora biti odabrana!<br>";
        } else {
            poljeSlika.style.border = "1px solid green";
            document.getElementById("porukaSlika").innerHTML = "";
        }

        var poljeCategory = document.getElementById("kategorija");
        if (poljeCategory.selectedIndex === 0) {
            slanjeForme = false;
            poljeCategory.style.border = "1px dashed red";
            document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
        } else {
            poljeCategory.style.border = "1px solid green";
            document.getElementById("porukaKategorija").innerHTML = "";
        }

        if (!slanjeForme) {
            event.preventDefault();
        }
    };
});
