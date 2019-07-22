pipeline {
     agent any
     stages {
     
stage("Docker build") {
     steps {
      
          sh "docker-compose build projet_php3"
     }
}
stage("Docker push") {
     steps {
   sh "docker login -u eldji22 -p Eldji@92f"
sh "docker-compose push projet_php3"
     }
}
stage("Deploy to staging") {
     steps {
 
          sh "docker-compose up"
     }
}
     }

}