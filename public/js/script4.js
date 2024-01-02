const base_url = "http://localhost:8080/koprasi-mahasiswa/public";
function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }
// script menampilkan foto hal add users
function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        selectedImage.src = e.target.result;
      };

      reader.readAsDataURL(fileInput.files[0]);
    }
  }
// end script menampilkan foto hal add users

$(document).ready(function(){
    $('.tEdit').on('click',function () {
        $('.modal-title').html('Edit Profile');
        //$('.tEdit').addClass('tSimpan');
        $('.tEdit').html(`Simpan`);
        $('.tEdit').addClass('tSimpan');
        const id = $(this).data("id");
        $.ajax({
            type: "post",
            url: ""+base_url+"/Users/getProfileUser",
            data: {id : id},
            dataType: 'json',
            success: function (data) {
                    data.forEach((item, index)=> {
                        $('#modal-body').html(`
                            <input type='hidden' name='fotoLama' value='${item.foto}'>
                            <input type="hidden" class="form-control" name="id" value="${item.id_pengguna}">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="${item.username}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="${item.nama}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nomor Hp" name="nomor_hp" value="${item.nomor_hp}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Usaha" name="nama_usaha" value="${item.nama_usaha}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" placeholder="Foto" name="foto">
                                    <div class="input-group-append">
                                        <div class="input-group-text"> 
                                        <span><img src='../public/img/${item.foto}' width='25' height='25'></span>
                                        </div>
                                    </div>
                                </div>
                            `);
                   });
               
            }
        });
        $('.tEdit').removeClass('tEdit');
        
    });

    $('.modal-footer').on('click', '.tSimpan', function () {
        $("form").attr("action", ""+base_url+"/Users/editProfileUser");
        $('.modal-footer').html(`
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        `);
    });

    $('.row').on('click', '#tClose', function() {
        $('.delete-flash').addClass('d-none');
    });


    // bagian crop img
    var bs_modal = $('#modal-img');
    var image = document.getElementById('image');
    var cropper,reader,file;
    
    $(".modal-body").on("change", ".image", function(e) {
        var files = e.target.files;
        namaFoto =+ files[0].name;
        
        var done = function(url) {
            image.src = url;
            bs_modal.modal('show');
        };
        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
        let imgLama = $('#img')[0].dataset.namaimg;
        console.log(imgLama);
        canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 300,
        });
        const id = $(this).data("id");
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
				//alert(base64data);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "http://localhost:8080/EngStudy/public/Users/ubahFotoProfile",
                    data: {
                        image: base64data,
                        id: id,
                        imgLama: imgLama
                    },
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });
            };
        });
    });
    // akhir bagian crop
    
  });

//   Quote btn
const quoteText = document.querySelector('.quote');
const authorName = document.querySelector('.name');
const quoteBtn = document.querySelector('#button-quote');
const copyBtn = document.querySelector('.copy');
const twitterBtn = document.querySelector('.twitter');

//quoter offline
const quotes = [
    {
        content: 'Do what makes you happy.', author: 'Yon Arifin'
    },
    {
        content: 'Teruslah belajar samapai kamu merasa jatuh cinta kepadanya.', author: 'Yon Arifin'
    },
    {
        content: 'Mengira bahwa kamu tidak akan meningalkanku adalah kesalahan terbesarku.', author: 'Yon Arifin'
    },
];
let randNum;
let ranStore = [];
function random(max){
    
    if(ranStore.length === max) {
        ranStore = [];
    }
    do{
        randNum = Math.floor(Math.random() * (max - 0) + 0);
    } while(ranStore.indexOf(randNum) !== -1)

    ranStore.push(randNum);
    return randNum;
}


//random function quote
function randomQuote() {
    quoteBtn.classList.add("loading");
    quoteBtn.innerText = "Loading Quote...";
    //fetching random quots/data from the API and parsing into JavaScript object
    fetch("https://api.quotable.io/random").then(res => res.json()).then(result => {
            quoteText.innerHTML = result.content;
            authorName.innerHTML =result.author;
            quoteBtn.innerText = "New Quote";
            quoteBtn.classList.remove("loading");
    });
}


const Qrand = randomQuote();
if(Qrand) {
    randomQuote();
} else {
    const randomQ = random(quotes.length);
    quoteText.innerHTML=`${quotes[randomQ].content}`;
    authorName.innerHTML=`${quotes[randomQ].author}`;
    
} 

quoteBtn.addEventListener("click", randomQuote);

copyBtn.addEventListener("click", ()=> {
    //mengopikan quote pada saat di click
    navigator.clipboard.writeText(`${quoteText.innerText} ___${authorName.innerText}`);
});

twitterBtn.addEventListener("click", ()=> {
    let twitterUrl = `https://twitter.com/intent/tweet?url=${quoteText.innerText} ---${authorName.innerText}`;
    window.open(twitterUrl, "__Blank");
});

//untuk sambutan
setTimeout(()=> {
    document.querySelector('.sambutan').classList.add('animate__animated', 'animate__bounceOutLeft');
    document.querySelector('.row-quote').classList.remove("d-none");
    
}, 4000);   
