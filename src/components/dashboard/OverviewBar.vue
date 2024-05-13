<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { VisAxis, VisStackedBar, VisXYContainer } from '@unovis/vue';

type Data = {
    name: string;
    total: number;
};

const data = ref<Data[]>([]);

onMounted(() => {
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const monthlyTotals = months.map((month) => ({
        name: month,
        total: Math.floor(Math.random() * 1000) + 1,
    }));

    data.value = monthlyTotals;
});
</script>

<template>
    <VisXYContainer height="350px" :margin="{ left: 20, right: 20 }" :data="data">
        <VisStackedBar :x="(d: Data, i: number) => i" :y="(d: Data) => d.total" color="#41b883" :rounded-corners="4"
            :bar-padding="0.15" />
        <VisAxis type="x" :num-ticks="data.length" :tick-format="(i: number) => data[i]?.name" :grid-line="false"
            :tick-line="false" color="#888888" />
        <VisAxis type="y" :num-ticks="5" :grid-line="false" :tick-line="false" color="#888888" />
    </VisXYContainer>
</template>
