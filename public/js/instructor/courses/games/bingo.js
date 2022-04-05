    var automatico = false;
    var timer;

    function playSound(sonido)
    {
        // Si se habilitan las líneas comentadas se puede
        // conseguir reproducir 2 audios (o más)

        //var audio1 = new Audio("/audio/hasalido.wav");
        //audio1.play();

        var audio2 = new Audio("/audio/" + sonido + ".wav");        
        audio2.play();

        // En lugar de audio2.play(), deberíamos ejecutarlo
        // con un tiempo de "delay" (cuando sea más de un audio)
        //setTimeout(() => { audio2.play(); }, 1500);
        

        
    }

    window.livewire.on('nuevoAudio', sonido => {            
        playSound(sonido);
    }); 

    window.livewire.on('finalizado', sonido => {            
        automatico = false;
        playSound(sonido);
    });    

    function iniciarAutomatico()
    {        
        if(automatico == true)
        {
            automatico = false;
            playSound("detenido");
            
            clearInterval(timer);
            console.log("Se ha desactivado automatico");
        }
        else
        {
            automatico = true;
            
            $("#botonAutomatico").hide();
            playSound("inicio");            

            // Iniciamos el Juego (jugamos cada 5 segundos)
            timer = setInterval(jugar, 5000);

            console.log("Se ha activado automatico");
        }
    }    

    function jugar()
    {
        if(automatico == true)
        {
            document.getElementById('botonJugar').click();                        
        }
    } 