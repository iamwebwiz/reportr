<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-12">
                <h2 class="text-center">Reportr</h2>
                <hr>
                <div class="form-group">
                    <input type="email" v-model="recipient" placeholder="Recipient Email Address" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" v-model="senderEmail" placeholder="Your Email Address" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" v-model="senderName" placeholder="Your Name" class="form-control">
                </div>
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
                </div>
                <div class="form-group">
                    <textarea v-model="comments" placeholder="Comments" class="form-control"></textarea>
                </div>

                <button @click="sendReport" class="btn btn-success btn-md btn-block" :disabled="sending">Submit Report</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Toastify from 'toastify-js';

    export default {
        data: function () {
            return {
                tasks: [],
                comments: '',
                duration: '',
                reportDate: '',
                employeeName: '',
                reportTitle: '',
                companyName: '',
                recipient: '',
                senderEmail: '',
                senderName: '',
                sending: false,
            }
        },

        methods: {
            addTask: function () {
                this.tasks.push({content: ''})
            },

            removeTask: function (index) {
                this.tasks.splice(index, 1)
            },

            sendReport: function () {
                this.sending = true;

                axios.post('/api/reports', {
                    tasks: this.tasks,
                    comments: this.comments,
                    duration: this.duration,
                    reportDate: this.reportDate,
                    employeeName: this.employeeName,
                    reportTitle: this.reportTitle,
                    companyName: this.companyName,
                    recipient: this.recipient,
                    senderEmail: this.senderEmail,
                    senderName: this.senderName
                }).then(response => {
                    Toastify({
                        text: response.data,
                        duration: 3000,
                        gravity: "top",
                        positionLeft: false,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();

                    console.log(response.data);
                    this.reset();
                }).catch(error => {
                    Toastify({
                        text: response.data,
                        duration: 3000,
                        gravity: "top",
                        positionLeft: false,
                        backgroundColor: "linear-gradient(to right, red, khaki)",
                    }).showToast();

                    console.log(error);
                    this.sending = false;
                })
            },

            reset: function () {
                this.tasks = [];
                this.comments = '';
                this.duration = '';
                this.reportDate = '';
                this.employeeName = '';
                this.reportTitle = '';
                this.companyName = '';
                this.recipient = '';
                this.senderEmail = '';
                this.senderName = '';
                this.sending = false;
            }
        },

        watch: {
            companyName: function (value) {
                if (value.toLowerCase().indexOf('medflit') !== -1) {
                    this.reportTitle = 'Medflit Task Report Sheet'
                } else {
                    this.reportTitle = ''
                }
            }
        }
    }
</script>
