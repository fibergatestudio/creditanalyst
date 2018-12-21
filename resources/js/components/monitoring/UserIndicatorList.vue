<template>
    <div>
        <h3>Мониторинг</h3>
        <template v-if="!list.length && !loading">
            <p>Ни один показатель небыл добавлен, <a href="/sources_list">добавьте</a> данные!</p>
            <a href="/indicator_search" class="btn btn-success">Поиск данных</a>
        </template>
        <template v-else>
            <table class="table table-striped table-hover table-sm">
                <tbody>
                    <tr v-for="(item,key) in list" :key="key">
                        <td :title="item.name" class="vlm" @click="Chart(item.id)" style="cursor: pointer">{{ item.alias || item.name }}</td>
                        <td class="vlm text-right">{{ item.value }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm minw40" @click="Notifications(item.id)" title="Уведомления">
                                <i class="far" :class="{'fa-bell': item.notify, 'fa-bell-slash': !item.notify}"></i>
                            </button>
                            <button class="btn btn-light btn-sm minw40" @click="Chart(item.id)" title="Динамика">
                                <i class="far fa-chart-bar"></i>
                            </button>
                            <button class="btn btn-danger btn-sm minw40" @click="RemoveFromList(item.id)" title="Удалить из списка">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        <line-chart v-show="chartData" :chart-data="chartData" :height="150" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
    </div>
</template>

<script>
import LineChart from './LineChart.js';
export default {
    name: 'UserIndicatorList',
    components: {
        LineChart
    },
    data(){
        return {
            loading: false,
            editMode: false,
            list: [],
            chartData: ''
        }
    },
    created(){
        this.LoadData();
    },
    mounted(){

    },
    methods:{
        LoadData(){
            this.$set(this, 'loading', true);
            axios.get('/monitoring/watchlist').then(response => {
                this.$set(this, 'loading', false);
                this.$set(this, 'list', response.data);
            });
        },
        RemoveFromList(id){
            axios.delete(`/monitoring/remove/${id}`).then(response => {
                this.LoadData();
            });
        },
        Notifications(id){

        },
        Chart(indicator_id){
            const request = {
                period: 'years',
            };
            axios.get(`/monitoring/chart/${indicator_id}`, {params: request}).then(response => {
                this.$set(this, 'chartData', response.data);
            });
        }
    }
}
</script>

<style scoped>
    .minw40 {
        min-width: 40px;
    }
    .vlm {
        vertical-align: middle;
    }
</style>
