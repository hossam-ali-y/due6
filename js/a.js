function selectFileWithCKFinder( elementId ) {
	CKFinder.popup( {
		chooseFiles: true,
		width: 900,
		height: 800,
		onInit: function( finder ) {
			finder.on( 'files:choose', function( evt ) {
				var file = evt.data.files.first();
				var output = document.getElementById( elementId );
        output.value = file.getUrl();
        var img=document.getElementById('img'+elementId);
        img.src= output.value ;
			} );

			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( elementId );
        output.value = evt.data.resizedUrl;
        var img=document.getElementById('img'+elementId);
        img.src= output.value ;
			} );
		}
	} );
}

function  clearinputs(input){
       var inp=document.getElementById(input);
       var img=document.getElementById('img'+input);

        inp.value='';img.src='';
        return false;
    }
    function setimge(input)  {
        var input1=document.getElementById(input);
       var img=document.getElementById('img'+input);
         img.src=input1.value;
    }
 