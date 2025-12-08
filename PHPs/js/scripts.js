var MainOption='';
var SelectOPtions='All'
function GetData(Dir,Search) {
    DetailsContainer = document.getElementById("JavaCodes");
    Spinner = document.getElementById("Loader-Spin");
    Spinner.style.display='flex';
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "FilesDetails.php?Dir=" + Dir+"&Search="+Search, true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            DetailsContainer.innerHTML = xhr.responseText;
            Spinner.style.display='none';
        } else {
            console.error("Error:", xhr.statusText);
        }
    };
    xhr.onerror = function () {
    console.error("Network Error");
  };
  xhr.send();
}
function shareLink() {
  const link = `https://mrabhin03.github.io/Codes-Hub/${(MainOption=="")?"":"?OpenFolder="+MainOption}`;
  console.log(link)
  if (navigator.share) {
    navigator.share({
      title: document.title,
      url: link
    }).catch(() => {});
    return;
  }

  const temp = document.createElement("input");
  temp.value = link;
  document.body.appendChild(temp);
  temp.select();
  document.execCommand("copy");
  temp.remove();

  alert("Link copied!");
}


document.getElementById('SearchDataInput').addEventListener('input', function() {
    GetData(MainOption,this.value)
});

function ActiveSelector(object){
    
    NavLinks=document.querySelectorAll(".nav-link");
    NavLinks.forEach(NavLink => {
        NavLink.classList.remove('active');
    });
    if(!object.classList.contains('nav-link')){
        object.querySelector(".nav-link").classList.add('active');
        SelectOPtions=(object.querySelector(".nav-link").getAttribute("data-label"));
    }else{
        object.classList.add('active');
        SelectOPtions=(object.getAttribute("data-label"));
    }
    
}
function selectOption(object,Path){
    ActiveSelector(object)
    MainOption=Path;
    document.getElementById('SearchDataInput').value='';
    document.getElementById('navbarSupportedContent').classList.remove("show")
    GetData(MainOption,'')
    setTimeout(()=>{
        document.querySelector('.codeData').scrollIntoView({ behavior: 'smooth' });
    },10)
    
}

function ResetValue(){
    // document.getElementById('SearchDataInput').value='';
}

