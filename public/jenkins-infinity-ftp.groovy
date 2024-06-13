pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building...'
                // Add your build steps here
            }
        }

        stage('Test') {
            steps {
                echo 'Creating test file ...'
                writeFile file: 'myTestFile.txt', text: """
                    APP_NAME=Laravel
                    APP_ENV=local
                    APP_KEY=base64:SomeRandomString
                    APP_DEBUG=true
                    APP_URL=http://localhost

                    LOG_CHANNEL=stack

                    DB_CONNECTION=mysql
                    """
            }
        }

        stage('Deploy') {
            steps {
                script {
                    ftpPublisher(
                        masterNodeName: 'master', // or the appropriate master node name for your setup
                        alwaysPublishFromMaster: false,
                        continueOnError: false,
                        failOnError: false,
                        publishers: [
                            [
                                configName: 'Infinityfree',
                                transfers: [
                                    [
                                        asciiMode: false,
                                        cleanRemote: false,
                                        excludes: '',
                                        flatten: false,
                                        makeEmptyDirs: false,
                                        noDefaultExcludes: false,
                                        patternSeparator: '[, ]+',
                                        remoteDirectory: '',
                                        remoteDirectorySDF: false,
                                        removePrefix: '',
                                        sourceFiles: '/lang/*'
                                    ],
                                    [
                                        asciiMode: false,
                                        cleanRemote: false,
                                        excludes: '',
                                        flatten: false,
                                        makeEmptyDirs: false,
                                        noDefaultExcludes: false,
                                        patternSeparator: '[, ]+',
                                        remoteDirectory: '',
                                        remoteDirectorySDF: false,
                                        removePrefix: '',
                                        sourceFiles: '/database/*'
                                    ],
                                     [
                                        asciiMode: false,
                                        cleanRemote: false,
                                        excludes: '',
                                        flatten: false,
                                        makeEmptyDirs: false,
                                        noDefaultExcludes: false,
                                        patternSeparator: '[, ]+',
                                        remoteDirectory: '',
                                        remoteDirectorySDF: false,
                                        removePrefix: '',
                                        sourceFiles: 'myTestFile.txt'
                                    ]
                                ],
                                usePromotionTimestamp: false,
                                useWorkspaceInPromotion: false,
                                verbose: true
                            ]
                        ]
                    )
                }
            }
        }
    }

    post {
        always {
            echo 'Cleaning up...'
            // Add any cleanup steps here
        }
    }
}
