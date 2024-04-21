<script setup lang="ts">
import Autoplay from 'embla-carousel-autoplay'
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel'
import { Card, CardContent } from '@/components/ui/card'
import poster1 from '@/assets/images/drugstore-poster.jpg'
import poster2 from '@/assets/images/drugstore-poster2.jpg'
import poster3 from '@/assets/images/drugstore-poster3.jpg'
import poster4 from '@/assets/images/drugstore-poster4.jpg'
import poster5 from '@/assets/images/drugstore-poster5.jpg'

const plugin = Autoplay({
    delay: 2000,
    stopOnMouseEnter: true,
    stopOnInteraction: false,
})

const posters = [poster1, poster2, poster3, poster4, poster5]
</script>

<template>
    <main>
        <Carousel class="relative w-full max-w-12xl" :plugins="[plugin]" @mouseenter="plugin.stop"
            @mouseleave="[plugin.reset(), plugin.play(), console.log('Runing')];">
            <CarouselContent>
                <CarouselItem v-for="(poster, index) in posters" :key="index" class="">
                    <div class="p-1">
                        <Card>
                            <CardContent class="flex aspect-auto items-center justify-center p-1 ">
                                <img :src="poster" alt="Poster Image" class="object-cover w-full h-[500px]">
                            </CardContent>
                        </Card>
                    </div>
                </CarouselItem>
            </CarouselContent>
            <CarouselPrevious />
            <CarouselNext />
        </Carousel>
    </main>
</template>