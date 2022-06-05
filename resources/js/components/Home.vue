<template>
    <div>
<!--        NAVIGACIJA-->
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">Nauja<span>Banga</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Galerija</a></li>
                <li><a href="#apie" class="menu-btn">Apie</a></li>
                <li><a href="#kontaktai" class="menu-btn">Kontaktai</a></li>
                <li><a href="#pasiulymai" class="menu-btn">Pasiulymai</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
<!--        NAVIGACIJA BAIGES-->
        <!--Skaidres-->
        <!--Skaidrius pabaiga-->
        <main class="mainas" id="apie">
            <div class="container px-lg-5">
            <div class="row mx-lg-n5">
                <div class="align-self-center col py-5 px-lg-5">
                    <h3 class="text-white">
                    UAB "Nauja banga" užsiima įvairiais statybos darbais tiek Lietuvoje, tiek užsienio šalyse. Pritaikę vietinę ir tarptautinę projektų įgyvendinimo patirtį ,nuolatos tobulėjame. Siekiame tapti šios srities projektų rinkos lyderiais.O darbuotojams ,labiausiai pageidaujama ir vertinama darbo vieta.
                    </h3>
                </div>
            </div>
    </div>
        </main>

        <footer id="pasiulymai" class="text-center text-white">
            <div class="container p-4">
                <section class="">
                    <form method="post" @submit.prevent="saveEmail">
                        <div class="row d-flex justify-content-center">
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong>Prenumeruokite musu naujienlaiški</strong>
                                </p>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="form-outline form-white mb-4">
                                    <input v-model="fields.email" name="email" type="email" class="form-control" id="emailas" aria-describedby="emailHelp" placeholder="El. pašto adressas">
                                    <div class="text-danger" v-if="errors && errors.email">{{ errors.email[0] }}</div>
                                    <label class="form-label" for="emailas"> </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-light mb-4 border-white">
                                    Susisiekite su mumis
                                </button>
                            </div>
                        </div>
                    </form>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2300.8070362688686!2d24.66122675083783!3d54.78335887370862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e767194cfff017%3A0x3667160a5207daca!2sDraugyst%C4%97s%20g.%2012%2C%20Elektr%C4%97nai%2026114%2C%20Lietuva!5e0!3m2!1slt!2sro!4v1637587208563!5m2!1slt!2sro" width="100%" height="50%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </section>
                <section class="mb-2 row justify-content-center" id="kontaktai">
                    <h4 class="mr-3">
                        Kontaktai :
                    </h4>
                    <h4 class="mr-3">
                        <strong>
                            +37064658898
                        </strong>
                    </h4>
                    <h4 class="mr-3">
                        <strong>
                            +46722665628
                        </strong>
                    </h4>
                    <h4 class="mr-3">
                        <strong>
                            naujabanga9@gmail.com
                        </strong>
                    </h4>
                </section>
            </div>
        </footer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {},
            errors: {},
            loaded: true,
        }
    },
    methods: {
        getImage(){
            return 'image/trikampis.png'
        },
        getImage2(){
            return 'image/a.jpg'
        },
        getImage3(){
            return 'image/b.jpg'
        },
        getImage4(){
            return 'image/c.jpg'
        },
        getImage5(){
            return 'image/banga.jpg'
        },
        getImage6(){
            return 'image/banga.jpg'
        },
        saveEmail(){
            if (this.loaded) {
                this.loaded = false;
                this.errors = {};
                axios.post('/api/store',this.fields).then(response => {
                    this.fields = {};
                    this.loaded = true;
                }).catch(error => {
                    const klaidele = 422;
                    if (error.response.status = klaidele) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            }
        },
    },

}
</script>
