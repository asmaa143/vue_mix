<template>
    <div className="container">
        <div className="head">
            <h2 id="title">Task List</h2>
            <store v-on:reloadtasks="getTask()"/>

        </div>
        <Task v-on:reloadtasks="getTask()" :tasks="tasks"/>

    </div>
</template>

<script>
import Store from "./Store";
import Task from "./Task";

export default {
    components: {Task, Store},
    data() {
        return {
            tasks: []
        }
    },
    methods: {
        getTask() {
            axios.get('api/tasks')
                .then(response => {
                    this.tasks = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getTask();
    }

}
</script>
<style scoped>
.container {
    width: 350px;
    margin: auto;
}

.head {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>
