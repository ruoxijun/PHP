var mv = new Vue({
    el: "#app",
    created() {
        this.getShowList()
    },
    methods: {
        getShowList() {
            console.log(axios.get('student.php'));
            axios.get('student.php').then(res => {
                console.log(res.data);
                this.showlist = res.data.students;
            })
        },
    },
    data() {
        return {
            showlist: []
        }
    },
});