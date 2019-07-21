pipeline {
     agent any
     stages {
     
stage("Docker build") {
     steps {
      
          sh "docker build -t eldji22/projet_php3 ."
     }
}
stage("Docker push") {
     steps {
   sh "docker login -u eldji22 -p Eldji@92f"
sh "docker push eldji22/projet_php3"
     }
}
stage("Deploy to staging") {
     steps {
 
          sh "docker run -d --rm -p 3200:3200 --name projet_php3 eldji22/projet_php3"
     }
}
     }
  post {
     always {
          sh "docker stop eldji22/projet_php3"
     }
}
}