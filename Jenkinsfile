pipeline { 
    agent any 
    stages { 
        stage('Clone Repository') { 
            steps { 
                git 'https://github.com/Mutiaaaputri/petshop_fix.git' 
            } 
        } 
        stage('Install Dependencies') { 
            steps { 
                echo'run'
            } 
        } 
        stage('Run Ansible Playbook1') { 
            steps { 
             echo'testing'
            } 
        } 
    } 
    post { 
        success { 
            echo 'Deployment successful!' 
        } 
        failure { 
            echo 'Deployment failed!' 
} 
} 
}
