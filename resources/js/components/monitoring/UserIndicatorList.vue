<template>
    <div>
        <template v-if="!list.length && !loading">
            <p>Ни один показатель небыл добавлен, <a href="/sources_list">добавьте</a> данные!</p>
            <a href="/indicator_search" style="border-color: #84c33d;" class="btn btn-success">Поиск данных</a>
        </template>
        <template v-else>
            <table class="table table-striped table-hover table-sm">
                <tbody>
                    <tr v-for="(item,key) in list" :key="key">
                        <template v-if="editItem.id === item.id">
                            <td :title="item.name" class="vlm">
                                <input class="form-control form-control-sm" v-model.trim="editItem.alias" @keyup.esc="ResetEdit" @keyup.enter="SaveItem">
                            </td>
                        </template>
                        <template v-else>
                            <td :title="item.name" class="vlm" @click="Chart(item)" style="cursor: pointer">{{ item.alias || item.name }}</td>
                        </template>
                        <td width="10%" style="white-space: nowrap" class="vlm text-right">{{ item.value }}</td>
                        <td width="10%" style="white-space: nowrap" class="vlm text-right">
                            <template v-if="item.delta.number > 0">
                                <i class="fas fa-arrow-up" style="font-size: 24px; float: left"></i>
                            </template>
                            <template v-if="item.delta.number < 0">
                                <i class="fas fa-arrow-down" style="font-size: 24px; float: left"></i>
                            </template>
                            <span style="font-size: 10px; float: right">
                                {{ item.delta.number }}<br>{{ item.delta.percent }} %
                            </span>
                        </td>
                        <td width="10%" style="white-space: nowrap">
                            <template v-if="editItem.id === item.id">
                                <button class="btn btn-success btn-sm minw40" @click="SaveItem" title="Сохранить">
                                    <i class="far fa-save"></i>
                                </button>
                            </template>
                            <template v-else>
                                <button class="btn btn-success btn-sm minw40" @click="Edit(item)" title="Редактировать">
                                    <i class="far fa-edit"></i>
                                </button>
                            </template>
                            <button class="btn btn-warning btn-sm minw40" @click="Notifications(item)" title="Уведомления">
                                <i class="far" :class="{'fa-bell': item.notify, 'fa-bell-slash': !item.notify}"></i>
                            </button>
                            <button class="btn btn-light btn-sm minw40" @click="Analyse(item)" title="Динамика">
                                <i class="far fa-chart-bar"></i>
                            </button>
                            <button class="btn btn-danger btn-sm minw40" @click="RemoveFromList(item)" title="Удалить из списка">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        <br>
        <line-chart v-show="chartData" :chart-data="chartData" :height="150" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
        <NotificationModal v-if="notificationItem" :item="notificationItem" @close="notificationItem = ''" @save="NotificationsSave"></NotificationModal>
    </div>
</template>

<script>
import LineChart from './LineChart.js';
import NotificationModal from './NotificationModal.vue';
export default {
    name: 'UserIndicatorList',
    components: {
        LineChart,
        NotificationModal
    },
    data(){
        return {
            notificationItem: '',
            loading: false,
            editItem: '',
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
        RemoveFromList(item){
            axios.delete(`/monitoring/${item.id}`).then(response => {
                this.LoadData();
            });
        },
        Notifications(item){
            this.$set(this, 'notificationItem', item);
        },
        NotificationsSave(item){
            //window.console.log(item);
            this.$set(this, 'loading', true);
            axios.put(`/monitoring/${item.id}`, item).then(response => {
                this.$set(this, 'loading', false);
                this.LoadData();
            });
            this.$set(this, 'notificationItem', '');
        },
        Edit(item){
            const clone = JSON.parse(JSON.stringify(item));
            this.$set(this, 'editItem', clone);
            if (!item.alias) {
                this.$set(this.editItem, 'alias', clone.name);
            }
        },
        ResetEdit(){
            this.$set(this, 'editItem', '');
        },
        SaveItem(){
            this.$set(this, 'loading', true);
            axios.put(`/monitoring/${this.editItem.id}`, this.editItem).then(response => {
                this.$set(this, 'loading', false);
                this.LoadData();
            });
            this.$set(this, 'editItem', '');
        },
        Analyse(item){
            // window.console.log(item);
            const dt = new Date();
            const year = dt.getFullYear();
            window.location = `/admin/statistics-analysis/charts?indicator_id=${item.indicator_id}&from=${year}-01-01&to=${year}-12-31`;
        },
        Chart(item){
            const request = {
                period: 'years',
            };
            axios.get(`/monitoring/chart/${item.id}`, {params: request}).then(response => {
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
