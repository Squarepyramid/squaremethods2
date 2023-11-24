<template>
    <div class="container-fluid mt-4" style=" height: 80vh">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <transition :name="transitionName" mode="out-in">
                    <div class="slide" :key="currentSlideIndex">
                        <template v-if="slides.length>0">
                        <h1>{{ slides[currentSlideIndex].title }}</h1>
                            <div v-if="isImageFileType(slides[currentSlideIndex])">
<!--                                 <i @click="toggleFullscreen"
                                    class="fa fa-expand full-screen-icon" style="color:#0c84ff"

                                ></i>-->
                            <img
                                :class="{ 'img-fluid': !fullscreen, 'full-screen-image': fullscreen }"
                                :src="slides[currentSlideIndex].content"
                                :alt="slides[currentSlideIndex].title"


                            />

                            </div>
                            <div v-else >
                                 <video class="video-block" :src="slides[currentSlideIndex].content" controls></video>
                            </div>
                        </template>
                    </div>
                </transition>
            </div>
        </div>
    </div>
    <div class="controls mt-3 position-absolute bottom-0 end-0">
        <button @click="prevSlide" :disabled="currentSlideIndex === 0" class="btn btn-primary">Previous</button>
        <button @click="nextSlide" :disabled="currentSlideIndex === slides.length - 1" class="btn btn-primary ml-2">Next</button>

    </div>
</template>
<script>
export default {
    name: "presenter_table_content",
    props:['procedures'],
    data() {
        return {
            currentSlideIndex: 0,
            slides: [
               /* {
                    title: 'Slide 1',
                    content: 'This is the content of Slide 1.',
                },
                {
                    title: 'Slide 2',
                    content: 'This is the content of Slide 2.',
                },
                {
                    title: 'Slide 3',
                    content: 'This is the content of Slide 3.',
                },*/
            ],
            transitionName: 'slide-fade-right',
            fullscreen: false,
        };
    },
    methods: {
        exitFullscreen(event) {
            //alert('hi');
            if (event.key === 'Escape' || event.key === 'Esc') {
                this.fullscreen = false;
            }
        },
        toggleFullscreen() {
            this.fullscreen = !this.fullscreen;
        },
        isImageFileType(file1) {
            if (file1.type && file1.type.includes('image')) {
                return true;
            }
            return false;
        },
        nextSlide() {
            if (this.currentSlideIndex < this.slides.length - 1) {
                this.currentSlideIndex++;
                this.transitionName = 'slide-fade-right';
            } else {
                this.currentSlideIndex = 0;
                this.transitionName = 'slide-fade-right';
            }
        },
        prevSlide() {
            if (this.currentSlideIndex > 0) {
                this.currentSlideIndex--;
                this.transitionName = 'slide-fade-left';
            } else {
                this.currentSlideIndex = this.slides.length - 1;
                this.transitionName = 'slide-fade-left';
            }
        },
        startAutoSlide() {
            this.stopAutoSlide(); // Clear the previous interval
            const randomInterval = Math.floor(Math.random() * (10000 - 3000) + 3000); // Random interval between 3 and 10 seconds
            this.autoSlideInterval = setInterval(() => {
                this.nextSlide();
            }, randomInterval);
        },
        stopAutoSlide() {
            clearInterval(this.autoSlideInterval);
            this.autoSlideInterval = null;
        },
    },
    mounted() {
        //this.startAutoSlide(); // Start auto-slide when the component is mounted
        //console.log(this.procedures);
        //alert('hi');
        let pros=JSON.parse(this.procedures);
        console.log(pros);
        this.slides=[];
        pros.forEach((item)=>{
            console.log(item);
            this.slides.push({
                title: item.procedure,
                content: item.illustration.file_path,
                type:item.illustration.file_type
            })
        })
        window.addEventListener('keydown', this.exitFullscreen);
       // console.log(this.slides);
    },
    beforeUnmount() {
        this.stopAutoSlide(); // Stop auto-slide when the component is unmounted
        window.removeEventListener('keydown', this.handleKeyDown);

    },
}
</script>

<style scoped>
/* Define right slide transition animation */
.slide-fade-right-enter-active, .slide-fade-right-leave-active {
    transition: transform 0.5s, opacity 0.5s;
}
.slide-fade-right-enter, .slide-fade-right-leave-to {
    transform: translateX(100%);
    opacity: 0;
}
.slide-fade-right-enter-to {
    transform: translateX(0);
}
.slide-fade-right-leave {
    transform: translateX(0);
}

/* Define left slide transition animation */
.slide-fade-left-enter-active, .slide-fade-left-leave-active {
    transition: transform 0.5s, opacity 0.5s;
}
.slide-fade-left-enter, .slide-fade-left-leave-to {
    transform: translateX(-100%);
    opacity: 0;
}
.slide-fade-left-enter-to {
    transform: translateX(0);
}
.slide-fade-left-leave {
    transform: translateX(0);
}
.full-screen-image {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    cursor: pointer;
}

.full-screen-icon {
    position: relative;
    right: -50vw;
    top:-25vh;
    font-size: 24px;
    color: white;
    cursor: pointer;
    z-index: 10000;
}
@media screen and (max-width: 768px) {
    .full-screen-icon {
        position: relative;
        right: -85vw;
        top:5vh;
        font-size: 24px;
        color: white;
        cursor: pointer;
        z-index: 10000;
    }
}
</style>
