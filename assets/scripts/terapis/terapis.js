function CustomConfirm(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (750 * .5)+"px";
        dialogbox.style.top = "120px";
        dialogbox.style.display = "block";
        
        // document.getElementById('dialogboxhead').innerHTML = "Kembali ke menu awal";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button id="confirm_button" style="margin-right: 40px" onclick="Confirm.yes()">YA</button> <button style="margin-left: 40px" id="confirm_button" onclick="Confirm.no()">TIDAK</button>';
    }
    this.no = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
        document.getElementById("pelanggan-barcode").focus();
    }
    this.yes = function(){            
        location.href = '{{ url('menuTerapis') }} ';
    }
}
var Confirm = new CustomConfirm();