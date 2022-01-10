<template>

    <div class="task">
        <input type="checkbox" v-model="task.done" @change="updateDone()">
        <span :class="[task.done?'done':'','auto']"> {{task.name}}</span>
        <button @click="remove()" class="remove">
            <font-awesome-icon icon="trash"></font-awesome-icon>
        </button>
    </div>

</template>

<script>
export default {
    name: "Item",
    props:["task"],
    methods:{
        updateDone(){
            axios.put('api/task/'+this.task.id,{
                task:this.task
            })
                .then(response => {
                    if(response.status ==200){
                        this.$emit('taskchanged')
                    }
                })
                .catch(error => {
                    console.log(error)
                })

        },
        remove(){
            axios.delete('api/task/' + this.task.id)
                .then(response => {
                    if(response.status ==200){
                        this.$emit('taskchanged')
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>
.task{
    display: flex;
    justify-content: center;
    align-items: center;
}
.auto{
    width: 100%;
    margin-left:20px ;
}
.done{
    text-decoration: line-through;
    color: #718096;
}
.remove{
    background: #e6e6e6;
    border: none;
    color: red;
    outline: none;
}
</style>
