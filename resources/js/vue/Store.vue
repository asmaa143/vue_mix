<template>
    <div class="add">
        <input type="text" v-model="task.name">
        <font-awesome-icon icon="plus-square"
                           @click="add()" :class="[task.name ? 'active':'deActive','plus']"/>
    </div>
</template>

<script>
export default {
    name: "Store",
    data(){
        return{
            task:{
                name:'',

            }
        }
    },
    methods:{
        add(){
            if(this.task.name ==''){

                return;
            }

            axios.post('api/task/store',{
                task: this.task
            }).then(response => {
                if(response.status == 201){
                    this.task.name =""
                    this.$emit('reloadtasks')
                }
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>
.add{
    display: flex;
    justify-content: center;
    align-items: center;
}
input{
    background: #f7f7f7;
    border: 0;
    outline: none;
    padding: 5px;
    margin-right:10px ;
    width: 100%;
}
.plus{
    font-size: 20px;
}
.active{
    color: blue;
}
.deActive{
    color: gray;
}
</style>
