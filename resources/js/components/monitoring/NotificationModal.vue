<template>
    <div class="modal-mask" tabindex="-1" @keyup.esc="closeDialog">
        <div class="modal-dialog" @keyup.esc="closeDialog">
            <form @submit.prevent="save">
                <div class="modal-content" @keyup.esc="closeDialog">
                    <div class="modal-header">
                        <h5 class="modal-title">Уведомления</h5>
                        <button type="button" class="close" @click="closeDialog">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <switch-control v-model="current.notify"></switch-control>


                        <h6>Куда выводидть уведомления:</h6>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="internal" id="exampleCheck1" v-model="current.notify_info.way">
                            <label class="form-check-label" for="exampleCheck1">В окно уведомлений</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="email" id="exampleCheck2" v-model="current.notify_info.way">
                            <label class="form-check-label" for="exampleCheck2">На электронную почту</label>
                        </div>
                        <br>
                        <h6>Когда отправлять уведомления:</h6>
                        <div class="form-check">
                            <input style="position: initial; margin-left: 0px; height: auto;" type="radio" class="form-check-input" value="event" id="exampleCheck3" v-model="current.notify_info.when">
                            <label class="form-check-label" for="exampleCheck3">При наступлении события</label>
                        </div>
                        <div class="form-check">
                            <input style="position: initial; margin-left: 0px; height: auto;" type="radio" class="form-check-input" value="digest" id="exampleCheck4" v-model="current.notify_info.when">
                            <label class="form-check-label" for="exampleCheck4">Включить внутренний дайджест</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import SwitchControl from './SwitchControl.vue';
export default {
    name: 'NotificationModal',
    props: {
        item: {
            type: Object,
            required: true
        },
    },
    components: {
        SwitchControl
    },
    data(){
        return {
            current: {},
        }
    },
    created(){
        const clone = JSON.parse(JSON.stringify(this.item));
        if (!clone.notify_info.hasOwnProperty('way')) {
            clone.notify_info['way'] = [];
        }
        if (!clone.notify_info.hasOwnProperty('when')) {
            clone.notify_info['when'] = 'event';
        }
        this.$set(this, 'current', clone);
    },
    mounted(){
        document.body.style.overflow = 'hidden';
    },
    destroyed(){
        document.body.style.overflow = 'auto';
    },
    methods: {
        closeDialog(){
            this.$emit('close');
        },
        save(){
            this.$emit('save', this.current);
        }
    }
}
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: block;
        overflow-x: hidden;
        overflow-y: auto;
        transition: opacity .3s ease;
    }
    
</style>
