<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-12">
                <h2 class="text-center">Reportr</h2>
                <hr>
                <div class="form-group">
                    <input type="text" v-model="companyName" placeholder="Company Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" v-model="reportTitle" placeholder="Report Title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" v-model="employeeName" placeholder="Employee Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="date" v-model="reportDate" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" v-model="duration" placeholder="Duration" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tasks Completed</label>
                    <div class="row mb-3" v-for="(task, index) in tasks" :key="index">
                        <div class="col-md-10 col-9">
                            <input type="text" v-model="task.content" placeholder="Task" class="form-control">
                        </div>
                        <div class="col-md-2 col-3">
                            <button class="btn btn-danger" @click="removeTask(index)">Remove</button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block mt-3" @click="addTask">Add</button>
                    <button class="btn btn-info btn-block mt-2" @click="showTasks">Show Tasks</button>
                </div>
                <div class="form-group">
                    <textarea v-model="comments" placeholder="Comments" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                tasks: [],
                comments: '',
                duration: '',
                reportDate: '',
                employeeName: '',
                reportTitle: '',
                companyName: ''
            }
        },

        methods: {
            addTask () {
                this.tasks.push({content: ''})
                console.log('Task added')
            },

            removeTask (index) {
                this.tasks.splice(index, 1)
            },

            showTasks () {
                this.tasks.map(task => console.log(task.content))
            }
        },

        watch: {
            companyName (value) {
                if (value.toLowerCase().indexOf('medflit') !== -1) {
                    this.reportTitle = 'Medflit Task Report Sheet'
                } else {
                    this.reportTitle = ''
                }
            }
        }
    }
</script>