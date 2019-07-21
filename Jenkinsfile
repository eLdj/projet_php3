pipeline {
     agent any
     stages {
          stage("Compile") {
               steps {
                    sh "./gradlew compileJava"
               }
          }
          stage("Unit test") {
               steps {
                    sh "./gradlew test"
               }
          }
     
    
stage("Package") {
     steps {
          sh "./gradlew build"
     }
}
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
 
          sh "docker run -d --rm -p 8765:8080 --name projet_php3 eldji22/projet_php3"
     }
}
stage("Acceptance test") {
     steps {
          sleep 60
          sh "./acceptance_test.sh"
     }
}
     }
  post {
     always {
          sh "docker stop projet_php3"
     }
}
}