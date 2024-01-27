<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include './config/db_con.php'?>

<style>
    .card-container{
        display: flex;
        flex-wrap: wrap;
        gap: 6rem;
        justify-content: space-evenly;
        padding: 4rem 0;
    }
    .card{
        border-radius: 2.4625rem !important;
        background: #FFF;
        box-shadow: 4px 4px 21.7px 0px rgba(0, 0, 0, 0.25);
        padding: 2rem;
        width: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
    }
    .card-top-mpd{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-top-mpd img{
        width: 300px;
        aspect-ratio: 1/1;
        object-fit: contain;
    }
    a{
       text-decoration: none !important; 
    }
    .card-bottom-mpd h5{
        text-align: center;
        
        color: #000;
        font-family: 'Poppins',sans-serif;
        font-size: 1rem;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: capitalize;
    }
    @media only screen and (max-width: 900px){
        .card-container{
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }
        .card{
            width: 100%;
            padding: 1rem;
            gap: 1rem;
        }
        .card-top-mpd img{
            width: 200px;
        }
        .card-container a{
            width: 70%;
        }
    }
</style>


<?php include './components/navbar.php' ?>


<div id="about">
    <div class="top-text" style="background: #B70021;">
        <h2 style="color: #FFF; font-size: 4rem;">IMPORTANT DOCUMENTS</h2>
    </div>
    
    <div class="card-container">
        <a href="https://drive.google.com/file/d/13Md5Qv3StNlaD6y_ky8Y3w6mN5X8dt3t/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/bs.svg" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>Building safety certificate</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13PvZCdzJ4zmByJY92bUsok2NWTrCFmVo/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/fs.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>Fire safety Certificate</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13Cjx241bqTa4IPfjbEEkZEEpKlYrMSQt/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/noc.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>NOC</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13Cds3QjeDrlWFK1Jq_jdISOxI9Ngws4N/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/ts.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>Transfer Certificate</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13T1N9fz_2ORzqomEi_vKG7Z3-vPlau7C/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/af.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>Copies of Affiliation</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13LggGMu25H5DVVrhfCa8OGe2bi4ygEuQ/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/wd.svg" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>Water,Health & Sanitation Certificate</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13_tOPGfz9gTtxp-zuNowFZMcMjneb_Ig/view?usp=drivesdk" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/fr.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>First Recognition</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13QS7S4Vzz8zbb8oZrTFWNWQ5gWEPrOGD/view?usp=drivesdk" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/donation.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>Fee Structure</h5>
                </div>
            </div>
        </a>
        <a href="https://drive.google.com/file/d/13_aBn2NJppjtz8FNs6iwU9HknaPhWPs2/view" target="_blank">
            <div class="card">
                <div class="card-top-mpd">
                    <img src="./src/img/gi.png" />
                </div>
                <div class="card-bottom-mpd">
                    <h5>General Information</h5>
                </div>
            </div>
        </a>
    </div>
</div>


<?php include './components/footer.php' ?>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<script>
    var swiper = new Swiper("#acaswiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
</script>