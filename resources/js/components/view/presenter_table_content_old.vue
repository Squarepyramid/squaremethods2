<template>
<!--    <div class="presentation-container"  style="background: yellow">-->
<!--&lt;!&ndash;        <div class="reveal">-->
<!--            <div class="slides">-->
<!--&lt;!&ndash;                afjladjflajdfl flakd fjlkdaf-->
<!--                <section v-for="(slide, index) in slides" :key="index">-->
<!--                    <h2>{{ slide.title }}</h2>-->
<!--                    <div v-html="slide.content"></div>-->
<!--                </section>&ndash;&gt;-->
<!--                <section>first</section>-->
<!--                <section>first</section>-->
<!--            </div>-->
<!--        </div>&ndash;&gt;-->

<!--           -->
<!--    </div>-->

    <div id="impress">
        <!-- Slide 1 with custom class 'custom-slide' -->
        <div id="first" class="step custom-slide" data-x="0" data-y="0">
            <h2>Slide 1</h2>
            <p>This is the content of Slide 1.</p>
        </div>
        <!-- Slide 2 with custom class 'custom-slide' -->
        <div id="second" class="step custom-slide" data-x="1000" data-y="0">
            <h2>Slide 2</h2>
            <p>This is the content of Slide 2.</p>
        </div>
        <!-- Slide 3 with custom class 'custom-slide' -->
        <div id="third" class="step custom-slide" data-x="2000" data-y="0">
            <h2>Slide 3</h2>
            <p>This is the content of Slide 3.</p>
        </div>
    </div>
    <div class="controls">
        <button @click="navigate('prev')">Previous</button>
        <button @click="navigate('next')">Next</button>
    </div>
</template>

<script>
import Reveal from 'reveal.js';
import 'reveal.js/dist/reset.css';
import 'reveal.js/dist/reveal.css';
//import 'reveal.js/dist/theme/black.css'; // Choose your preferred theme
import 'reveal.js/dist/theme/sky.css'; // Choose your preferred theme
import Markdown from 'reveal.js/plugin/markdown/markdown.esm.js';

export default {
    name: "presenter_table_content",
    data() {
        return {
            slides: [
                { title: 'Introduction', content: 'Your introduction content' },
                { title: 'Slide 1', content: 'Content for slide 1' },
                { title: 'Slide 2', content: 'Content for slide 2' },
                // Add more slides as needed
            ],
        };
    },
    mounted() {
        // Initialize Deck.js when the component is mounted
        //this.initializeDeckJs();
        // Initialize the Deck.js presentation
        const presentation = impress();
        presentation.init();
    },
    methods: {
        navigate(direction) {
            const presentation = impress();
            if (direction === 'prev') {
                presentation.prev();
            } else if (direction === 'next') {
                presentation.next();
            }
        },
    },
}
</script>

<style scoped>
/*.presentation-container {*/
/*    width: 80%;*/
/*    margin: 0 auto;*/
/*}*/

.controls {
    position: absolute;
    bottom: 10px;
    right: 10px;
    text-align: right;
}

.controls button {
    padding: 10px 20px;
    margin: 0 10px;
    cursor: pointer;
}
.custom-slide {
    width: 1420px; /* Adjust the width as needed */
    background: yellow;
   height: 500px;
}
</style>
