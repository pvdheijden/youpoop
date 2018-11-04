pipeline {
  agent {
    docker {
      image 'node:6-alpine'
      args '''-e "PORT=3000"
            -p 3000:3000'''
      }
    }
  stages {
    stage('Build') {
      steps {
        sh 'npm install'
      }
    }
    stage('Test') {
      steps {
        sh 'npm test'
      }
    }
  }
}